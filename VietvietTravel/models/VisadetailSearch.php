<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visadetail;

/**
 * VisadetailSearch represents the model behind the search form about `app\models\Visadetail`.
 */
class VisadetailSearch extends Visadetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_visa'], 'integer'],
            [['fullame', 'nation', 'idpassport', 'birthday', 'expire', 'flightdetail', 'arrivaldate', 'exitdate', 'portarrival', 'purposevisit'], 'safe'],
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
        $query = Visadetail::find();

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
            'id_visa' => $this->id_visa,
            'birthday' => $this->birthday,
            'expire' => $this->expire,
            'arrivaldate' => $this->arrivaldate,
            'exitdate' => $this->exitdate,
        ]);

        $query->andFilterWhere(['like', 'fullame', $this->fullame])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'idpassport', $this->idpassport])
            ->andFilterWhere(['like', 'flightdetail', $this->flightdetail])
            ->andFilterWhere(['like', 'portarrival', $this->portarrival])
            ->andFilterWhere(['like', 'purposevisit', $this->purposevisit]);

        return $dataProvider;
    }
}
