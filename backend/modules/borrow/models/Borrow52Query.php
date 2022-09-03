<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Borrow52]].
 *
 * @see Borrow52
 */
class Borrow52Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Borrow52[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Borrow52|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
