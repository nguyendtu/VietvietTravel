<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hotel;

/**
 * HotelSearch represents the model behind the search form about `app\models\Hotel`.
 */
class HotelSearch extends Hotel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'star', 'status', 'hot'], 'integer'],
            [['name', 'id_location', 'address', 'price', 'briefinfo', 'detailinfo', 'smallimg', 'largeimg', 'regdate', 'editdate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Hotel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('location');

        $query->andFilterWhere([
            'id' => $this->id,
            'star' => $this->star,
            'regdate' => $this->regdate,
            'editdate' => $this->editdate,
            'status' => $this->status,
            'hot' => $this->hot,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'briefinfo', $this->briefinfo])
            ->andFilterWhere(['like', 'detailinfo', $this->detailinfo])
            ->andFilterWhere(['like', 'smallimg', $this->smallimg])
            ->andFilterWhere(['like', 'largeimg', $this->largeimg])
            ->andFilterWhere(['like', 'location.name', $this->id_location]);

        return $dataProvider;
    }
}
