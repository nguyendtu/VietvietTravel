<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visa;

/**
 * VisaSearch represents the model behind the search form about `app\models\Visa`.
 */
class VisaSearch extends Visa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numapply', 'usebefore', 'receiveinfo', 'status'], 'integer'],
            [['fullname', 'email', 'mobile', 'nation', 'visatype', 'processtime', 'message', 'knwthrough', 'paymethod', 'regdate'], 'safe'],
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
        $query = Visa::find();

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
            'numapply' => $this->numapply,
            'usebefore' => $this->usebefore,
            'receiveinfo' => $this->receiveinfo,
            'regdate' => $this->regdate,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'visatype', $this->visatype])
            ->andFilterWhere(['like', 'processtime', $this->processtime])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'knwthrough', $this->knwthrough])
            ->andFilterWhere(['like', 'paymethod', $this->paymethod]);

        return $dataProvider;
    }
}
