<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property string $briefinfo
 * @property string $smallimg
 * @property string $detailinfo
 * @property string $regdate
 * @property string $editdate
 * @property integer $id_user
 * @property integer $hot
 * @property integer $status
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'briefinfo', 'detailinfo', 'id_user'], 'required'],
            [['type', 'id_user', 'hot', 'status'], 'integer'],
            [['briefinfo', 'detailinfo'], 'string'],
            [['regdate', 'editdate', 'smallimg'], 'safe'],
            [['title', 'smallimg'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'briefinfo' => 'Briefinfo',
            'smallimg' => 'Smallimg',
            'detailinfo' => 'Detailinfo',
            'regdate' => 'Regdate',
            'editdate' => 'Editdate',
            'id_user' => 'Id User',
            'hot' => 'Hot',
            'status' => 'Status',
        ];
    }

    /**
     * relation to tourtype table
     */
    public function getTourtype(){
        return $this->hasOne(Tourtype::className(), ['id' => 'type']);
    }
}
