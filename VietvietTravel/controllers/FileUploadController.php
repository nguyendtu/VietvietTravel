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
    public function actionUpload(){
        $fileUpload = UploadedFile::getInstanceByName('FileUpload[fileUpload]');

        if($fileUpload){
            $fileUpload->saveAs('C:/xampp/htdocs/VietvietTravel/VietvietTravel/web/images/' . $fileUpload->baseName . '.' . $fileUpload->extension);

            return true;
        }

        return false;
    }
}
?>