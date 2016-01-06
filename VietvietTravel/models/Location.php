<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $id
 * @property string $name
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 255],
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
            'description' => 'Description',
        ];
    }

    /*
     * relation to hotel table
     */
    public function getHotels(){
        return $this->hasMany(Hotel::className(), ['id_location' => 'id']);
    }
}
