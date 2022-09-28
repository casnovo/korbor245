<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "wh24".
 *
 * @property int $idwh24
 * @property string $code
 * @property string $name
 * @property int $sum
 * @property string $img
 *
 * @property Borrow24[] $borrow24s
 * @property Borrowreturn[] $borrowreturnIdbrs
 */
class Wh24 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wh24';
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
            [['countunit'], 'string', 'max' => 10],
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
            'countunit' => 'หน่วยนับ',
        ];
    }

    /**
     * Gets query for [[Borrow24s]].
     *
     * @return \yii\db\ActiveQuery|borrow24Query
     */
    public function getBorrow24s()
    {
        return $this->hasMany(Borrow24::className(), ['wh24_idwh24' => 'idwh24']);
    }

    /**
     * Gets query for [[BorrowreturnIdbrs]].
     *
     * @return \yii\db\ActiveQuery|BorrowreturnQuery
     */
    public function getBorrowreturnIdbrs()
    {
        return $this->hasMany(Borrowreturn::className(), ['idbr' => 'borrowreturn_idbr'])->viaTable('borrow24', ['wh24_idwh24' => 'idwh24']);
    }

    /**
     * {@inheritdoc}
     * @return Wh24Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Wh24Query(get_called_class());
    }
}
