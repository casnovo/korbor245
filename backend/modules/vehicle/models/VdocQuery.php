<?php

namespace backend\modules\vehicle\models;

/**
 * This is the ActiveQuery class for [[Vdoc]].
 *
 * @see Vdoc
 */
class VdocQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vdoc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vdoc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
