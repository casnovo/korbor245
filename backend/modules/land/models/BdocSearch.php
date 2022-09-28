<?php

namespace backend\modules\land\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\land\models\Bdoc;

/**
 * BdocSearch represents the model behind the search form of `backend\modules\land\models\Bdoc`.
 */
class BdocSearch extends Bdoc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'building_id'], 'integer'],
            [['name', 'doc', 'docurl', 'docformat', 'createat', 'updateat', 'recorder', 'editor'], 'safe'],
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
        $query = Bdoc::find();

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
            'createat' => $this->createat,
            'updateat' => $this->updateat,
            'building_id' => $this->building_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'docurl', $this->docurl])
            ->andFilterWhere(['like', 'docformat', $this->docformat])
            ->andFilterWhere(['like', 'recorder', $this->recorder])
            ->andFilterWhere(['like', 'editor', $this->editor]);

        return $dataProvider;
    }
}
