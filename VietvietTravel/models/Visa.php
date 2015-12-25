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
            'mobile' => 'Mobile',
            'nation' => 'Nation',
            'numapply' => 'Numapply',
            'visatype' => 'Visatype',
            'processtime' => 'Processtime',
            'message' => 'Message',
            'usebefore' => 'Usebefore',
            'receiveinfo' => 'Receiveinfo',
            'knwthrough' => 'Knwthrough',
            'paymethod' => 'Paymethod',
            'regdate' => 'Regdate',
            'status' => 'Status',
        ];
    }
}
