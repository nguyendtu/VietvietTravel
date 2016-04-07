<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tour".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_tourtype
 * @property string $code
 * @property integer $length
 * @property string $startfrom
 * @property string $price
 * @property string $briefinfo
 * @property string $detailinfo
 * @property string $smallimg
 * @property string $largeimg
 * @property string $regdate
 * @property string $editdate
 * @property integer $hot
 * @property integer $status
 */
class Tour extends \yii\db\ActiveRecord
{
    public $limg;
    public $simg;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'length', 'smallimg', 'largeimg', 'keyword'], 'required'],
            [['length', 'hot', 'status', 'id_tourtype'], 'integer'],
            [['briefinfo', 'detailinfo'], 'string'],
            [['regdate', 'editdate'], 'safe'],
            [['name', 'startfrom', 'price', 'smallimg', 'largeimg'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50]
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
            'id_tourtype' => 'Tourtype',
            'code' => 'Code',
            'length' => 'Length',
            'startfrom' => 'Startfrom',
            'price' => 'Price',
            'briefinfo' => 'Briefinfo',
            'detailinfo' => 'Detailinfo',
            'smallimg' => 'Smallimg',
            'largeimg' => 'Largeimg',
            'regdate' => 'Regdate',
            'editdate' => 'Editdate',
            'hot' => 'Hot',
            'status' => 'Status',
            'keyword' => 'Keyword',
        ];
    }

    /* relation to tourtype table */
    public function getTourtype(){
        return $this->hasOne(Tourtype::className(), ['id' => 'id_tourtype']);
    }

    /* relation to booktour table */
    public function getBooktours(){
        return $this->hasMany(Booktour::className(), ['id_tour' => 'id']);
    }
}
