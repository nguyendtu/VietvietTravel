<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\User;
use app\components\AccessRule;
use yii\web\UploadedFile;
use yii\web\Response;

class FileUploadController extends Controller{

    /* action upload file */
    public function actionUpload(){

        $fileUpload = UploadedFile::getInstanceByName('FileUpload[fileUpload]');

        if($fileUpload){
            //$fileUpload->saveAs('C:/xampp/htdocs/VietvietTravel/VietvietTravel/web/images/' . $fileUpload->baseName . '.' . $fileUpload->extension);
            $fileUpload->saveAs(Yii::$app->basePath . '/web/images/' . $fileUpload->baseName . '.' . $fileUpload->extension);

            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = [];

            $response['files'][] = [
                'name' => $fileUpload->name,
                'type' => $fileUpload->type,
                'size' => $fileUpload->size,
                'url' => $fileUpload->tempName,
                'thumbnailUrl' => $fileUpload->tempName,
                'deleteUrl' => \yii\helpers\Url::to(['delete', 'name' => $fileUpload->name]),
                'deleteType' => 'POST',
            ];
            return $response;
        }
    }

    public function actionDelete($name){
        return unlink('C:/xampp/htdocs/VietvietTravel/VietvietTravel/web/images/' . $name);
    }
}
?>