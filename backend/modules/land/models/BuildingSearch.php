<?php

namespace backend\modules\land\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\land\models\Building;

/**
 * BuildingSearch represents the model behind the search form of `backend\modules\land\models\Building`.
 */
class BuildingSearch extends Building
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'land_id'], 'integer'],
            [['name', 'namecode', 'pic', 'pics', 'status2', 'created_at', 'updated_at', 'recorder', 'editor'], 'safe'],
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
        $query = Building::find();

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
            'status' => $this->status,
            'land_id' => $this->land_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'namecode', $this->namecode])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'pics', $this->pics])
            ->andFilterWhere(['like', 'status2', $this->status2])
            ->andFilterWhere(['like', 'recorder', $this->recorder])
            ->andFilterWhere(['like', 'editor', $this->editor]);

        return $dataProvider;
    }
}
