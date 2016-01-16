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
            'fullname' => 'Full name',
            'email' => 'Email',
            'phone' => 'Phone number',
            'nation' => 'Nationality',
            'message' => 'Message',
            'usebefore' => 'Yes, i have travelled with TNK Travel before',
            'receiveinfo' => 'Yes, i want to receive newsletters from TNK Travel',
            'knwthrough' => 'You know us through',
            'regdate' => 'Regdate',
            'status' => 'Status',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject("Contact") /*$this->subject*/
                ->setTextBody($this->message)
                ->send();

            return true;
        }
        return false;
    }
}
