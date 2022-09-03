<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Wh52]].
 *
 * @see Wh52
 */
class Wh52Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Wh52[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Wh52|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
