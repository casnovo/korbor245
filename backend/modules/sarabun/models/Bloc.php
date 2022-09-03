<?php

namespace backend\modules\sarabun\models;

use Yii;

/**
 * This is the model class for table "bloc".
 *
 * @property int $idbloc หมายเลขแฟ้ม
 * @property string $name ชื่อแฟ้ม
 * @property string $detail รายละเอียดแฟ้ม
 * @property string|null $datarefer เอกสารอ้างอิง
 *
 * @property Sarabunin[] $sarabunins
 * @property Sarabunout[] $sarabunouts
 */
class Bloc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bloc';
    }
    public $file;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbloc', 'name', 'detail'], 'required'],
            [['idbloc'], 'integer'],
            [['name', 'detail'], 'string', 'max' => 45],
            [['file'],'file'],
            [['datarefer'], 'string', 'max' => 100],
            [['idbloc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbloc' => 'หมายเลขแฟ้ม',
            'name' => 'ชื่อแฟ้ม',
            'detail' => 'รายละเอียดแฟ้ม',
            'datarefer' => 'เอกสารอ้างอิง',
            'file' => 'อัพโหลดเอกสารอ้างอิง',
        ];
    }

    /**
     * Gets query for [[Sarabunins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSarabunins()
    {
        return $this->hasMany(Sarabunin::className(), ['bloc_idbloc' => 'idbloc']);
    }

    /**
     * Gets query for [[Sarabunouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSarabunouts()
    {
        return $this->hasMany(Sarabunout::className(), ['bloc_idbloc' => 'idbloc']);
    }
}
