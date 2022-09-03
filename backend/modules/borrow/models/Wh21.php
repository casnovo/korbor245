<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "wh21".
 *
 * @property int $idwh21
 * @property string|null $code
 * @property string $kind
 * @property string $sn
 * @property string|null $copsn
 * @property int $statas
 * @property string $img
 * @property string $position
 *
 * @property Borrowreturn[] $borrowreturns
 */
class Wh21 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wh21';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kind', 'sn', 'statas', 'img', 'position'], 'required'],
            [['statas'], 'integer'],
            [['code', 'kind', 'sn', 'copsn', 'img', 'position'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idwh21' => 'Idwh 21',
            'code' => 'Code',
            'kind' => 'Kind',
            'sn' => 'Sn',
            'copsn' => 'Copsn',
            'statas' => 'Statas',
            'img' => 'Img',
            'position' => 'Position',
        ];
    }

    /**
     * Gets query for [[Borrowreturns]].
     *
     * @return \yii\db\ActiveQuery|BorrowreturnQuery
     */
    public function getBorrowreturns()
    {
        return $this->hasMany(Borrowreturn::className(), ['wh21_idwh21' => 'idwh21']);
    }

    /**
     * {@inheritdoc}
     * @return Wh21Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Wh21Query(get_called_class());
    }
}
