<?php

namespace backend\modules\vehicle\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\vehicle\models\vdoc;

/**
 * VdocSearch represents the model behind the search form of `backend\modules\vehicle\models\vdoc`.
 */
class VdocSearch extends vdoc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id'], 'integer'],
            [['name', 'doc', 'docurl', 'docformat'], 'safe'],
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
        $query = vdoc::find();

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
            'vehicle_id' => $this->vehicle_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'docurl', $this->docurl])
            ->andFilterWhere(['like', 'docformat', $this->docformat]);

        return $dataProvider;
    }
}
