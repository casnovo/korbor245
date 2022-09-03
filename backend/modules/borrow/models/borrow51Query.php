<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Borrow51]].
 *
 * @see Borrow51
 */
class borrow51Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Borrow51[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Borrow51|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
