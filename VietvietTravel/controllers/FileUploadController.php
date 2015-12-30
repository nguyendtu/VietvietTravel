<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\User;
use app\components\AccessRule;
use yii\web\UploadedFile;

class FileUploadController extends Controller{

    /* action upload file */
    public function actionUpload($field){
        $fileUpload = UploadedFile::getInstanceByName('FileUpload[fileUpload]');
        $fileUpload->field = $field;
        if($fileUpload){
            $fileUpload->saveAs('C:/xampp/htdocs/VietvietTravel/VietvietTravel/web/images/' . $fileUpload->baseName . '.' . $fileUpload->extension);
            //Yii::$app->response->getHeaders()->set('Vary', 'Accept');
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $response = [];

            $response['files'][] = [
                'name' => $fileUpload->name,
                'type' => $fileUpload->type,
                'size' => $fileUpload->size,
                'url' => $fileUpload->tempName,
                'field' => $fileUpload->field,
                'thumbnailUrl' => $fileUpload->tempName,
                'deleteUrl' => \yii\helpers\Url::to(['delete', 'name' => $fileUpload->name]),
                'deleteType' => 'POST'
            ];
        }
        return $response;
    }
}
?>