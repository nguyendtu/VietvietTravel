<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visa".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $email
 * @property string $mobile
 * @property string $nation
 * @property integer $numapply
 * @property string $visatype
 * @property string $processtime
 * @property string $message
 * @property integer $usebefore
 * @property integer $receiveinfo
 * @property string $knwthrough
 * @property string $paymethod
 * @property string $regdate
 * @property integer $status
 */
class Visa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'mobile', 'nation', 'numapply', 'visatype', 'processtime'], 'required'],
            [['numapply', 'usebefore', 'receiveinfo', 'status'], 'integer'],
            [['message'], 'string'],
            [['regdate'], 'safe'],
            [['fullname', 'email', 'visatype', 'processtime', 'knwthrough', 'paymethod'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 30],
            [['nation'], 'string', 'max' => 100]
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
            'mobile' => 'Phone number',
            'nation' => 'Nationality',
            'numapply' => 'Number of Applications',
            'visatype' => 'Visa type',
            'processtime' => 'Processing time',
            'message' => 'Message',
            'usebefore' => 'Yes, i have travelled with TNK Travel before',
            'receiveinfo' => 'Yes, i want to receive newsletters from TNK Travel',
            'knwthrough' => 'You know us through',
            'paymethod' => 'Your preferred payment method',
            'regdate' => 'Regdate',
            'status' => 'Status',
        ];
    }

    /*
     * relation to visadetail table
     */
    public function getVisadetails(){
        return $this->hasMany(Visadetail::className(), ['id_visa' => 'id']);
    }
}
