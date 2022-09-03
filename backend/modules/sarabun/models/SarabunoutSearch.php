<?php

namespace backend\modules\sarabun\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\sarabun\models\sarabunout;

/**
 * SarabunoutSearch represents the model behind the search form of `backend\modules\sarabun\models\sarabunout`.
 */
class SarabunoutSearch extends sarabunout
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsarabun', 'bloc_idbloc', 'entryagency_identryagency'], 'integer'],
            [['binid', 'bdate', 'details', 'note', 'data'], 'safe'],
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
        $query = sarabunout::find();

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
            'idsarabun' => $this->idsarabun,
            'bdate' => $this->bdate,
            'bloc_idbloc' => $this->bloc_idbloc,
            'entryagency_identryagency' => $this->entryagency_identryagency,
        ]);

        $query->andFilterWhere(['like', 'binid', $this->binid])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
