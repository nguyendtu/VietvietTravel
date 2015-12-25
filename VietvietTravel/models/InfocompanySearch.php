<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Infocompany;

/**
 * InfocompanySearch represents the model behind the search form about `app\models\Infocompany`.
 */
class InfocompanySearch extends Infocompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'logo', 'address', 'mobile', 'tel', 'email', 'license', 'fax', 'website', 'facebook', 'skype', 'zalo', 'yahoo', 'viber', 'map', 'video'], 'safe'],
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
        $query = Infocompany::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'license', $this->license])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'zalo', $this->zalo])
            ->andFilterWhere(['like', 'yahoo', $this->yahoo])
            ->andFilterWhere(['like', 'viber', $this->viber])
            ->andFilterWhere(['like', 'map', $this->map])
            ->andFilterWhere(['like', 'video', $this->video]);

        return $dataProvider;
    }
}
