<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booktour".
 *
 * @property integer $id
 * @property integer $id_tour
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $nation
 * @property integer $nadults
 * @property string $listname
 * @property integer $child
 * @property string $childinfo
 * @property string $depdate
 * @property string $idea
 * @property integer $visa
 * @property integer $usebefore
 * @property integer $reciveinfo
 * @property string $paymethod
 * @property string $knwthrough
 */
class Booktour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booktour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tour', 'fullname', 'email', 'phone'], 'required'],
            [['id_tour', 'nadults', 'child', 'visa', 'usebefore', 'reciveinfo'], 'integer'],
            [['childinfo', 'idea'], 'string'],
            [['depdate'], 'safe'],
            [['fullname', 'email', 'nation', 'paymethod', 'knwthrough'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100],
            [['listname'], 'string', 'max' => 2048]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tour' => 'Id Tour',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'nation' => 'Nation',
            'nadults' => 'Nadults',
            'listname' => 'Listname',
            'child' => 'Child',
            'childinfo' => 'Childinfo',
            'depdate' => 'Depdate',
            'idea' => 'Idea',
            'visa' => 'Visa',
            'usebefore' => 'Usebefore',
            'reciveinfo' => 'Reciveinfo',
            'paymethod' => 'Paymethod',
            'knwthrough' => 'Knwthrough',
        ];
    }
}
