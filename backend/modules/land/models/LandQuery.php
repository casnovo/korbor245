<?php

namespace backend\modules\land\models;

/**
 * This is the ActiveQuery class for [[Land]].
 *
 * @see Land
 */
class LandQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Land[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Land|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
