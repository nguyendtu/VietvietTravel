<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tour;

/**
 * TourSearch represents the model behind the search form about `app\models\Tour`.
 */
class TourSearch extends Tour
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'length', 'hot', 'status'], 'integer'],
            [['name', 'keyword', 'id_tourtype', 'code', 'startfrom', 'price', 'briefinfo', 'detailinfo', 'smallimg', 'largeimg', 'regdate', 'editdate'], 'safe'],
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
        $query = Tour::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(!isset($this->status)){
            $this->status  = 1;
        }

        $query->joinWith("tourtype");

        $query->andFilterWhere([
            'id' => $this->id,
            'length' => $this->length,
            'regdate' => $this->regdate,
            'editdate' => $this->editdate,
            'hot' => $this->hot,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tour.name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'tourtype.name', $this->id_tourtype])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'startfrom', $this->startfrom])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'briefinfo', $this->briefinfo])
            ->andFilterWhere(['like', 'detailinfo', $this->detailinfo])
            ->andFilterWhere(['like', 'smallimg', $this->smallimg])
            ->andFilterWhere(['like', 'largeimg', $this->largeimg]);

        return $dataProvider;
    }
}
