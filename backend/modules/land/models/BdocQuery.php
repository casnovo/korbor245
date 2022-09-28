<?php

namespace backend\modules\land\models;

/**
 * This is the ActiveQuery class for [[Bdoc]].
 *
 * @see Bdoc
 */
class BdocQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Bdoc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Bdoc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
