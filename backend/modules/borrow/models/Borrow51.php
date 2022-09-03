<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "borrow51".
 *
 * @property int $borrowreturn_idbr
 * @property int $wh51_idwh24
 * @property int|null $quantity
 *
 * @property Borrowreturn $borrowreturnIdbr
 * @property Wh51 $wh51Idwh24
 */
class Borrow51 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrow51';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['borrowreturn_idbr', 'wh51_idwh24'], 'required'],
            [['borrowreturn_idbr', 'wh51_idwh24', 'quantity'], 'integer'],
            [['borrowreturn_idbr', 'wh51_idwh24'], 'unique', 'targetAttribute' => ['borrowreturn_idbr', 'wh51_idwh24']],
            [['borrowreturn_idbr'], 'exist', 'skipOnError' => true, 'targetClass' => Borrowreturn::className(), 'targetAttribute' => ['borrowreturn_idbr' => 'idbr']],
            [['wh51_idwh24'], 'exist', 'skipOnError' => true, 'targetClass' => Wh51::className(), 'targetAttribute' => ['wh51_idwh24' => 'idwh24']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'borrowreturn_idbr' => 'Borrowreturn Idbr',
            'wh51_idwh24' => 'Wh 51 Idwh 24',
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
     * Gets query for [[Wh51Idwh24]].
     *
     * @return \yii\db\ActiveQuery|Wh51Query
     */
    public function getWh51Idwh24()
    {
        return $this->hasOne(Wh51::className(), ['idwh24' => 'wh51_idwh24']);
    }

    /**
     * {@inheritdoc}
     * @return borrow51Query the active query used by this AR class.
     */
    public static function find()
    {
        return new borrow51Query(get_called_class());
    }
}
