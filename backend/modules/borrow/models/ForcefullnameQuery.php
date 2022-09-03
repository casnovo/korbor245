<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Forcefullname]].
 *
 * @see Forcefullname
 */
class ForcefullnameQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Forcefullname[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Forcefullname|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
