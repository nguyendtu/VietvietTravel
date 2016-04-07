<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tourtype".
 *
 * @property integer $id
 * @property string $name
 * @property string $parent
 * @property string $description
 * @property string $icon
 */
class Tourtype extends \yii\db\ActiveRecord
{
    public $simg;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tourtype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent'], 'required'],
            [['name', 'parent'], 'string', 'max' => 255],
            [['description', 'icon'], 'string', 'max' => 1024]
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
            'parent' => 'Parent',
            'description' => 'Description',
            'icon' => 'Icon',
        ];
    }

    /**
     * relation to tour table
     */
    public function getTours(){
        return $this->hasMany(Tour::className(), ['id_tourtype' => 'id']);
    }

    /**
     * relation to article table
     */
    public function getArticles(){
        return $this->hasMany(Article::className(), ['type' => 'id']);
    }
}
