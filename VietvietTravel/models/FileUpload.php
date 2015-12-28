<?php

    namespace app\models;

    use Yii;
    use yii\base\Model;

    class FileUpload extends Model{
        /* attribute save file uploaded */
        public $fileUpload;

        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['fileUpload'], 'file'],
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'fileUpload' => 'File upload',
            ];
        }
    }

?>