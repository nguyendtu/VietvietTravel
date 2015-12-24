<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $permit
 * @property string $pwd
 * @property string $fullname
 * @property string $tel
 * @property string $address
 * @property integer $status
 * @property string $regdate
 * @property string $authKey
 * @property string $accessToken
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_USER = 'C';
    const ROLE_ADMIN = 'A';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'pwd', 'fullname', 'regdate', 'authKey', 'accessToken'], 'required'],
            [['permit'], 'string'],
            [['status'], 'integer'],
            [['regdate'], 'safe'],
            [['email'], 'string', 'max' => 100],
            [['pwd', 'authKey', 'accessToken'], 'string', 'max' => 40],
            [['fullname'], 'string', 'max' => 50],
            [['tel'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'permit' => 'Permit',
            'pwd' => 'Pwd',
            'fullname' => 'Fullname',
            'tel' => 'Tel',
            'address' => 'Address',
            'status' => 'Status',
            'regdate' => 'Regdate',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    private static $users = null;


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users['id']) ? new static(self::$users['id']) : null;
        return  static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        self::$users = new User();
        self::$users = static::find()->where(['accessToken' => $token])->one();

        return self::$users;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        self::$users = new User();
        self::$users = User::find()->where(['email'=>$email])->one();
        return self::$users;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return self::$users['id'];
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return self::$users['authKey'];
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return self::$users['authKey'] === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return self::$users['pwd'] === $password;
    }
}
