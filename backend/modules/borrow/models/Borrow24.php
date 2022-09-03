<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "borrow24".
 *
 * @property int $borrowreturn_idbr
 * @property int $wh24_idwh24
 * @property int|null $quantity
 *
 * @property Borrowreturn $borrowreturnIdbr
 * @property Wh24 $wh24Idwh24
 */
class Borrow24 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrow24';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['borrowreturn_idbr', 'wh24_idwh24'], 'required'],
            [['borrowreturn_idbr', 'wh24_idwh24', 'quantity'], 'integer'],
            [['borrowreturn_idbr', 'wh24_idwh24'], 'unique', 'targetAttribute' => ['borrowreturn_idbr', 'wh24_idwh24']],
            [['borrowreturn_idbr'], 'exist', 'skipOnError' => true, 'targetClass' => Borrowreturn::className(), 'targetAttribute' => ['borrowreturn_idbr' => 'idbr']],
            [['wh24_idwh24'], 'exist', 'skipOnError' => true, 'targetClass' => Wh24::className(), 'targetAttribute' => ['wh24_idwh24' => 'idwh24']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'borrowreturn_idbr' => 'Borrowreturn Idbr',
            'wh24_idwh24' => 'Wh 24 Idwh 24',
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
     * Gets query for [[Wh24Idwh24]].
     *
     * @return \yii\db\ActiveQuery|Wh24Query
     */
    public function getWh24Idwh24()
    {
        return $this->hasOne(Wh24::className(), ['idwh24' => 'wh24_idwh24']);
    }

    /**
     * {@inheritdoc}
     * @return borrow24Query the active query used by this AR class.
     */
    public static function find()
    {
        return new borrow24Query(get_called_class());
    }
}
