<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Wh24]].
 *
 * @see Wh24
 */
class Wh24Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Wh24[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Wh24|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
