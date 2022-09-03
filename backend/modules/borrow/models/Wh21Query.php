<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Wh21]].
 *
 * @see Wh21
 */
class Wh21Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Wh21[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Wh21|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
