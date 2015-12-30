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
}