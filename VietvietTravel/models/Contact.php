<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $nation
 * @property string $message
 * @property integer $usebefore
 * @property integer $receiveinfo
 * @property string $knwthrough
 * @property string $regdate
 * @property integer $status
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'phone', 'nation', 'regdate'], 'required'],
            [['message'], 'string'],
            [['usebefore', 'receiveinfo', 'status'], 'integer'],
            [['regdate'], 'safe'],
            [['fullname', 'email', 'nation', 'knwthrough'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'nation' => 'Nation',
            'message' => 'Message',
            'usebefore' => 'Usebefore',
            'receiveinfo' => 'Receiveinfo',
            'knwthrough' => 'Knwthrough',
            'regdate' => 'Regdate',
            'status' => 'Status',
        ];
    }
}
