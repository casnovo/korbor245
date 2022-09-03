<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Force]].
 *
 * @see Force
 */
class ForceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Force[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Force|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
