<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Wh51]].
 *
 * @see Wh51
 */
class Wh51Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Wh51[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Wh51|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
