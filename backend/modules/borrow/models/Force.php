<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "force".
 *
 * @property string $idforce หมายเลขบัตรประชาชน
 * @property string $forcerang ยศ
 * @property string|null $forcename ชื่อ
 * @property string|null $forcesurname นามสกุล
 * @property string|null $forcebank บัญชี
 * @property string|null $forceunit ปฏิบัติหน้าที่/สังกัด
 * @property string $position ตำแหน่ง
 *
 * @property Borrowreturn[] $borrowreturns
 */
class Force extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'force';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idforce', 'forcerang', 'position'], 'required'],
            [['idforce'], 'string', 'max' => 13],
            [['forcerang', 'forcename', 'forcesurname', 'forcebank', 'forceunit', 'position'], 'string', 'max' => 45],
            [['idforce'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idforce' => 'หมายเลขบัตรประชาชน',
            'forcerang' => 'ยศ',
            'forcename' => 'ชื่อ',
            'forcesurname' => 'นามสกุล',
            'forcebank' => 'บัญชี',
            'forceunit' => 'ปฏิบัติหน้าที่/สังกัด',
            'position' => 'ตำแหน่ง',
        ];
    }

    /**
     * Gets query for [[Borrowreturns]].
     *
     * @return \yii\db\ActiveQuery|BorrowreturnQuery
     */
    public function getBorrowreturns()
    {
        return $this->hasMany(Borrowreturn::className(), ['force_idforce' => 'idforce']);
    }

    /**
     * {@inheritdoc}
     * @return ForceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ForceQuery(get_called_class());
    }
}
