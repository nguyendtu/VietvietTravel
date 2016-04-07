<?php

namespace app\controllers;

use dosamigos\fileupload\FileUpload;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\User;
use app\components\AccessRule;
use yii\web\UploadedFile;
use yii\web\Response;

class FileUploadController extends Controller{

    private static function str_trim($name){
        $name = str_ireplace("(Copy)", "1", $name);
        $name = str_ireplace("Copy", "1", $name);
        $name = str_ireplace(" ", "_", $name);
        $name = str_ireplace("-", "_", $name);
        //$name = str_ireplace(" ", "_", $name);

        return $name;
    }
    /* action upload file */
    public function actionUpload(){

        //$fileUpload = UploadedFile::getInstanceByName('FileUpload[fileUpload]');

        $fileUpload = $_FILES['smallimg'];
        $name = $fileUpload['name'];
        $fileUpload['name'] = FileUploadController::str_trim($name);



        if(!empty($fileUpload)){
            //$fileUpload->saveAs(Yii::$app->basePath . '/web/images/' . implode("_", explode(" ", $fileUpload['name'])));
            move_uploaded_file($fileUpload['tmp_name'], Yii::$app->basePath . '/web/images/' . $fileUpload['name']);
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = [];

        $response['files'] = [
            'name' => $fileUpload['name'],
            'type' => $fileUpload['type'],
            'size' => $fileUpload['size'],
            //'url' => $fileUpload->tempName,
            //'thumbnailUrl' => $fileUpload->tempName,
            'deleteUrl' => \yii\helpers\Url::to(['/file-upload/delete', 'name' => $fileUpload['name']]),
            //'deleteType' => 'POST',
        ];
        return $response;
    }

    public function actionDelete($name){
        //return unlink('C:/xampp/htdocs/VietvietTravel/VietvietTravel/web/images/' . $name);
        return unlink((Yii::$app->basePath . '/web/images/' . $name));
        //return unlink('/images/' . $name);
    }
}
?>