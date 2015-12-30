<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property integer $id
 * @property string $name
 * @property integer $star
 * @property integer $id_location
 * @property string $address
 * @property string $price
 * @property string $briefinfo
 * @property string $detailinfo
 * @property string $smallimg
 * @property string $largeimg
 * @property string $regdate
 * @property string $editdate
 * @property integer $status
 * @property integer $hot
 */
class Hotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['name', 'id_location', 'address', 'price', 'briefinfo'], 'required'],
            [['star', 'id_location', 'status', 'hot'], 'integer'],
            [['briefinfo', 'detailinfo'], 'string'],
            [['regdate', 'editdate'], 'safe'],
            [['name', 'address', 'price'], 'string', 'max' => 255],
            [['smallimg'], 'string', 'max' => 100],
            [['largeimg'], 'string', 'max' => 1024],
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
            'star' => 'Star',
            'id_location' => 'Id Location',
            'address' => 'Address',
            'price' => 'Price',
            'briefinfo' => 'Briefinfo',
            'detailinfo' => 'Detailinfo',
            'smallIMG' => 'Small Image Upload',
            'smallimg' => 'Smallimg',
            'largeIMG' => 'Large Image Upload',
            'largeimg' => 'Largeimg',
            'regdate' => 'Regdate',
            'editdate' => 'Editdate',
            'status' => 'Status',
            'hot' => 'Hot',
        ];
    }

    /* relation to location table */
    public function getLocation(){
        return $this->hasOne(Location::className(), ['id' => 'id_location']);
    }
}
