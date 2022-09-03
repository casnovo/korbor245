<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Borrow24]].
 *
 * @see Borrow24
 */
class borrow24Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Borrow24[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Borrow24|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
