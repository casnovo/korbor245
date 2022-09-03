<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "borrow52".
 *
 * @property int $borrowreturn_idbr
 * @property int $wh52_idwh24
 * @property int|null $quantity
 *
 * @property Borrowreturn $borrowreturnIdbr
 * @property Wh52 $wh52Idwh24
 */
class Borrow52 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrow52';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['borrowreturn_idbr', 'wh52_idwh24'], 'required'],
            [['borrowreturn_idbr', 'wh52_idwh24', 'quantity'], 'integer'],
            [['borrowreturn_idbr', 'wh52_idwh24'], 'unique', 'targetAttribute' => ['borrowreturn_idbr', 'wh52_idwh24']],
            [['borrowreturn_idbr'], 'exist', 'skipOnError' => true, 'targetClass' => Borrowreturn::className(), 'targetAttribute' => ['borrowreturn_idbr' => 'idbr']],
            [['wh52_idwh24'], 'exist', 'skipOnError' => true, 'targetClass' => Wh52::className(), 'targetAttribute' => ['wh52_idwh24' => 'idwh24']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'borrowreturn_idbr' => 'Borrowreturn Idbr',
            'wh52_idwh24' => 'Wh 52 Idwh 24',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[BorrowreturnIdbr]].
     *
     * @return \yii\db\ActiveQuery|BorrowreturnQuery
     */
    public function getBorrowreturnIdbr()
    {
        return $this->hasOne(Borrowreturn::className(), ['idbr' => 'borrowreturn_idbr']);
    }

    /**
     * Gets query for [[Wh52Idwh24]].
     *
     * @return \yii\db\ActiveQuery|Wh52Query
     */
    public function getWh52Idwh24()
    {
        return $this->hasOne(Wh52::className(), ['idwh24' => 'wh52_idwh24']);
    }

    /**
     * {@inheritdoc}
     * @return Borrow52Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Borrow52Query(get_called_class());
    }
}
