<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Borrowreturn]].
 *
 * @see Borrowreturn
 */
class BorrowreturnQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Borrowreturn[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Borrowreturn|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
