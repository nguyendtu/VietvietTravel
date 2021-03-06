<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "infocompany".
 *
 * @property integer $id
 * @property string $name
 * @property image $logoImg
 * @property string $logo
 * @property string $address
 * @property string $mobile
 * @property string $tel
 * @property string $email
 * @property string $license
 * @property string $fax
 * @property string $website
 * @property string $facebook
 * @property string $skype
 * @property string $zalo
 * @property string $yahoo
 * @property string $viber
 * @property string $map
 * @property video $videoMp4
 * @property string $video
 */
class Infocompany extends \yii\db\ActiveRecord
{
    /* logo img*/
    public $slogo;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'infocompany';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'logo', 'address', 'mobile', 'tel', 'email', 'license', 'fax', 'website', 'facebook', 'skype', 'zalo', 'yahoo', 'viber', 'video'], 'string', 'max' => 255],
            [['name', 'logo', 'address', 'mobile', 'tel', 'email', 'license', 'fax', 'website', 'facebook', 'skype', 'zalo', 'yahoo', 'viber', 'map', 'video'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'address' => 'Address',
            'mobile' => 'Mobile',
            'tel' => 'Tel',
            'email' => 'Email',
            'license' => 'License',
            'fax' => 'Fax',
            'website' => 'Website',
            'facebook' => 'Facebook',
            'skype' => 'Skype',
            'zalo' => 'Zalo',
            'yahoo' => 'Yahoo',
            'viber' => 'Viber',
            'map' => 'Map',
            'video' => 'Video',
        ];
    }
}
