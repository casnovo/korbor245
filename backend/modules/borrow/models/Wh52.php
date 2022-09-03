<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "wh52".
 *
 * @property int $idwh24
 * @property string $code
 * @property string $name
 * @property int $sum
 * @property string $img
 *
 * @property Borrow52[] $borrow52s
 * @property Borrowreturn[] $borrowreturnIdbrs
 */
class Wh52 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wh52';
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
     * Gets query for [[Borrow52s]].
     *
     * @return \yii\db\ActiveQuery|Borrow52Query
     */
    public function getBorrow52s()
    {
        return $this->hasMany(Borrow52::className(), ['wh52_idwh24' => 'idwh24']);
    }

    /**
     * Gets query for [[BorrowreturnIdbrs]].
     *
     * @return \yii\db\ActiveQuery|BorrowreturnQuery
     */
    public function getBorrowreturnIdbrs()
    {
        return $this->hasMany(Borrowreturn::className(), ['idbr' => 'borrowreturn_idbr'])->viaTable('borrow52', ['wh52_idwh24' => 'idwh24']);
    }

    /**
     * {@inheritdoc}
     * @return Wh52Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Wh52Query(get_called_class());
    }
}
