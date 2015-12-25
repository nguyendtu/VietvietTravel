<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visadetail".
 *
 * @property integer $id
 * @property integer $id_visa
 * @property string $fullame
 * @property string $nation
 * @property string $idpassport
 * @property string $birthday
 * @property string $expire
 * @property string $flightdetail
 * @property string $arrivaldate
 * @property string $exitdate
 * @property string $portarrival
 * @property string $purposevisit
 */
class Visadetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visadetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_visa', 'fullame', 'nation', 'idpassport', 'birthday', 'expire'], 'required'],
            [['id_visa'], 'integer'],
            [['birthday', 'expire', 'arrivaldate', 'exitdate'], 'safe'],
            [['fullame', 'nation', 'idpassport', 'flightdetail', 'portarrival', 'purposevisit'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_visa' => 'Id Visa',
            'fullame' => 'Fullame',
            'nation' => 'Nation',
            'idpassport' => 'Idpassport',
            'birthday' => 'Birthday',
            'expire' => 'Expire',
            'flightdetail' => 'Flightdetail',
            'arrivaldate' => 'Arrivaldate',
            'exitdate' => 'Exitdate',
            'portarrival' => 'Portarrival',
            'purposevisit' => 'Purposevisit',
        ];
    }
}
