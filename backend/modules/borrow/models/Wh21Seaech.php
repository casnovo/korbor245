<?php

namespace backend\modules\borrow\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\borrow\models\Wh21;

/**
 * Wh21Seaech represents the model behind the search form of `backend\modules\borrow\models\Wh21`.
 */
class Wh21Seaech extends Wh21
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idwh21', 'statas'], 'integer'],
            [['code', 'kind', 'sn', 'copsn', 'img', 'position'], 'safe'],
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
        $query = Wh21::find();

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
            'idwh21' => $this->idwh21,
            'statas' => $this->statas,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'kind', $this->kind])
            ->andFilterWhere(['like', 'sn', $this->sn])
            ->andFilterWhere(['like', 'copsn', $this->copsn])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
