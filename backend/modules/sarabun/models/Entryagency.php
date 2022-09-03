<?php

namespace backend\modules\sarabun\models;

use Yii;

/**
 * This is the model class for table "entryagency".
 *
 * @property int $identryagency หมายเลขหน่วยงานหนังสือเข้า
 * @property string|null $name ชื่อหน่วยงาน
 *
 * @property Sarabunin[] $sarabunins
 * @property Sarabunout[] $sarabunouts
 */
class Entryagency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entryagency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identryagency'], 'required'],
            [['identryagency'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['identryagency'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'identryagency' => 'หมายเลขหน่วยงานหนังสือเข้า',
            'name' => 'ชื่อหน่วยงาน',
        ];
    }

    /**
     * Gets query for [[Sarabunins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSarabunins()
    {
        return $this->hasMany(Sarabunin::className(), ['entryagency_identryagency' => 'identryagency']);
    }

    /**
     * Gets query for [[Sarabunouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSarabunouts()
    {
        return $this->hasMany(Sarabunout::className(), ['entryagency_identryagency' => 'identryagency']);
    }
}
