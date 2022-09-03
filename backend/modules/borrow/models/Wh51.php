<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "wh51".
 *
 * @property int $idwh24
 * @property string $code
 * @property string $name
 * @property int $sum
 * @property string $img
 *
 * @property Borrow51[] $borrow51s
 * @property Borrowreturn[] $borrowreturnIdbrs
 */
class Wh51 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wh51';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idwh24', 'code', 'name', 'sum', 'img'], 'required'],
            [['idwh24', 'sum'], 'integer'],
            [['code', 'name', 'img'], 'string', 'max' => 45],
            [['idwh24'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idwh24' => 'Idwh 24',
            'code' => 'Code',
            'name' => 'Name',
            'sum' => 'Sum',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Borrow51s]].
     *
     * @return \yii\db\ActiveQuery|borrow51Query
     */
    public function getBorrow51s()
    {
        return $this->hasMany(Borrow51::className(), ['wh51_idwh24' => 'idwh24']);
    }

    /**
     * Gets query for [[BorrowreturnIdbrs]].
     *
     * @return \yii\db\ActiveQuery|BorrowreturnQuery
     */
    public function getBorrowreturnIdbrs()
    {
        return $this->hasMany(Borrowreturn::className(), ['idbr' => 'borrowreturn_idbr'])->viaTable('borrow51', ['wh51_idwh24' => 'idwh24']);
    }

    /**
     * {@inheritdoc}
     * @return Wh51Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Wh51Query(get_called_class());
    }
}
