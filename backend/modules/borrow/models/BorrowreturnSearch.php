<?php

namespace backend\modules\borrow\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\borrow\models\Borrowreturn;

/**
 * BorrowreturnSearch represents the model behind the search form of `backend\modules\borrow\models\Borrowreturn`.
 */
class BorrowreturnSearch extends Borrowreturn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbr', 'wh21_idwh21', 'status'], 'integer'],
            [['force_idforce', 'docbor', 'docreturn', 'borrowdate', 'returndate'], 'safe'],
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
        $query = Borrowreturn::find();

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
            'idbr' => $this->idbr,
            'wh21_idwh21' => $this->wh21_idwh21,
            'status' => $this->status,
            'borrowdate' => $this->borrowdate,
            'returndate' => $this->returndate,
        ]);

        $query->andFilterWhere(['like', 'force_idforce', $this->force_idforce])
            ->andFilterWhere(['like', 'docbor', $this->docbor])
            ->andFilterWhere(['like', 'docreturn', $this->docreturn]);

        return $dataProvider;
    }
}
