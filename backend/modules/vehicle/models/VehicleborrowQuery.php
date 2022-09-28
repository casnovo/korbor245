<?php

namespace backend\modules\vehicle\models;

/**
 * This is the ActiveQuery class for [[Vehicleborrow]].
 *
 * @see Vehicleborrow
 */
class VehicleborrowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vehicleborrow[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vehicleborrow|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
