<?php

namespace backend\modules\land\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\land\models\Land;

/**
 * LandSearch represents the model behind the search form of `backend\modules\land\models\Land`.
 */
class LandSearch extends Land
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['landname', 'landaddress', 'landlat', 'landlong', 'landarea', 'landpic', 'landpics', 'landcode', 'landdetill', 'landkind', 'recorder', 'editor'], 'safe'],
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
        $query = Land::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'landname', $this->landname])
            ->andFilterWhere(['like', 'landaddress', $this->landaddress])
            ->andFilterWhere(['like', 'landlat', $this->landlat])
            ->andFilterWhere(['like', 'landlong', $this->landlong])
            ->andFilterWhere(['like', 'landarea', $this->landarea])
            ->andFilterWhere(['like', 'landpic', $this->landpic])
            ->andFilterWhere(['like', 'landpics', $this->landpics])
            ->andFilterWhere(['like', 'landcode', $this->landcode])
            ->andFilterWhere(['like', 'landdetill', $this->landdetill])
            ->andFilterWhere(['like', 'landkind', $this->landkind])
            ->andFilterWhere(['like', 'recorder', $this->recorder])
            ->andFilterWhere(['like', 'editor', $this->editor]);

        return $dataProvider;
    }
}
