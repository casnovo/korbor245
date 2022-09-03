<?php

namespace backend\modules\borrow\models;

/**
 * This is the ActiveQuery class for [[Wh21full]].
 *
 * @see Wh21full
 */
class Wh21fullQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Wh21full[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Wh21full|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
