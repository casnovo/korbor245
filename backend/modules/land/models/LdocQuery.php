<?php

namespace backend\modules\land\models;

/**
 * This is the ActiveQuery class for [[Ldoc]].
 *
 * @see Ldoc
 */
class LdocQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ldoc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ldoc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
