<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booktour;

/**
 * BooktourSearch represents the model behind the search form about `app\models\Booktour`.
 */
class BooktourSearch extends Booktour
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tour', 'nadults', 'child', 'visa', 'usebefore', 'reciveinfo'], 'integer'],
            [['fullname', 'status', 'email', 'phone', 'nation', 'listname', 'childinfo', 'depdate', 'idea', 'paymethod', 'knwthrough'], 'safe'],
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
        $query = Booktour::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(isset($_GET['BooktourSearch']['status']) && $_GET['BooktourSearch']['status'] == 'Complete'){
            $this->status = 1;
        }else{
            $this->status = 0;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_tour' => $this->id_tour,
            'nadults' => $this->nadults,
            'child' => $this->child,
            'depdate' => $this->depdate,
            'visa' => $this->visa,
            'usebefore' => $this->usebefore,
            'reciveinfo' => $this->reciveinfo,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'listname', $this->listname])
            ->andFilterWhere(['like', 'childinfo', $this->childinfo])
            ->andFilterWhere(['like', 'idea', $this->idea])
            ->andFilterWhere(['like', 'paymethod', $this->paymethod])
            ->andFilterWhere(['like', 'knwthrough', $this->knwthrough])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
