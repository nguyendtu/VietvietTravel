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
            [['id', 'id_tourtype', 'length', 'hot', 'status'], 'integer'],
            [['name', 'code', 'startfrom', 'price', 'briefinfo', 'detailinfo', 'smallimg', 'largeimg', 'regdate', 'editdate'], 'safe'],
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

        $query->andFilterWhere([
            'id' => $this->id,
            'id_tourtype' => $this->id_tourtype,
            'length' => $this->length,
            'regdate' => $this->regdate,
            'editdate' => $this->editdate,
            'hot' => $this->hot,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'startfrom', $this->startfrom])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'briefinfo', $this->briefinfo])
            ->andFilterWhere(['like', 'detailinfo', $this->detailinfo])
            ->andFilterWhere(['like', 'smallimg', $this->smallimg])
            ->andFilterWhere(['like', 'largeimg', $this->largeimg]);

        return $dataProvider;
    }
}
