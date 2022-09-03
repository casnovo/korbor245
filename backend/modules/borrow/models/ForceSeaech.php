<?php

namespace backend\modules\borrow\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\borrow\models\Force;

/**
 * ForceSeaech represents the model behind the search form of `backend\modules\borrow\models\Force`.
 */
class ForceSeaech extends Force
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idforce', 'forcerang', 'forcename', 'forcesurname', 'forcebank', 'forceunit', 'position'], 'safe'],
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
        $query = Force::find();

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
        $query->andFilterWhere(['like', 'idforce', $this->idforce])
            ->andFilterWhere(['like', 'forcerang', $this->forcerang])
            ->andFilterWhere(['like', 'forcename', $this->forcename])
            ->andFilterWhere(['like', 'forcesurname', $this->forcesurname])
            ->andFilterWhere(['like', 'forcebank', $this->forcebank])
            ->andFilterWhere(['like', 'forceunit', $this->forceunit])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
