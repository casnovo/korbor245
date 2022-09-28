<?php

namespace backend\modules\vehicle\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\vehicle\models\vehicle;

/**
 * VehicleSearch represents the model behind the search form of `backend\modules\vehicle\models\vehicle`.
 */
class VehicleSearch extends vehicle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['brand', 'model', 'enginenumber', 'bodynumber', 'carregistration', 'status', 'kind', 'detill','status2'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = vehicle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'enginenumber', $this->enginenumber])
            ->andFilterWhere(['like', 'bodynumber', $this->bodynumber])
            ->andFilterWhere(['like', 'carregistration', $this->carregistration])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'kind', $this->kind])
            ->andFilterWhere(['like', 'status2', $this->status2])
            ->andFilterWhere(['like', 'detill', $this->detill]);

        return $dataProvider;
    }
}
