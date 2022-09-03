<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "forcefullname".
 *
 * @property string $idforce หมายเลขบัตรประชาชน
 * @property string|null $fullname
 */
class Forcefullname extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forcefullname';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idforce'], 'required'],
            [['idforce'], 'string', 'max' => 13],
            [['fullname'], 'string', 'max' => 138],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idforce' => 'หมายเลขบัตรประชาชน',
            'fullname' => 'Fullname',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ForcefullnameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ForcefullnameQuery(get_called_class());
    }
}
