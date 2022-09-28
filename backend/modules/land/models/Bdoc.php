<?php

namespace backend\modules\land\models;

use Yii;

/**
 * This is the model class for table "bdoc".
 *
 * @property int $id ลำดับ
 * @property string|null $name ชื่อเอกสาร
 * @property string|null $doc เอกสาร
 * @property string|null $docurl ที่อยู่เอกสาร
 * @property string|null $docformat ชนืดเอกสาร
 * @property string|null $createat สร้างเมื่อ
 * @property string|null $updateat แก้ใขเมื่อ
 * @property int $building_id
 * @property string|null $recorder
 * @property string|null $editor
 *
 * @property Building $building
 */
class Bdoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bdoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createat', 'updateat'], 'safe'],
            [['building_id'], 'required'],
            [['building_id'], 'integer'],
            [['name', 'doc', 'docurl', 'recorder', 'editor'], 'string', 'max' => 100],
            [['docformat'], 'string', 'max' => 45],
            [['building_id'], 'exist', 'skipOnError' => true, 'targetClass' => Building::className(), 'targetAttribute' => ['building_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับ',
            'name' => 'ชื่อเอกสาร',
            'doc' => 'เอกสาร',
            'docurl' => 'ที่อยู่เอกสาร',
            'docformat' => 'ชนืดเอกสาร',
            'createat' => 'สร้างเมื่อ',
            'updateat' => 'แก้ใขเมื่อ',
            'building_id' => 'Building ID',
            'recorder' => 'Recorder',
            'editor' => 'Editor',
        ];
    }

    /**
     * Gets query for [[Building]].
     *
     * @return \yii\db\ActiveQuery|BuildingQuery
     */
    public function getBuilding()
    {
        return $this->hasOne(Building::className(), ['id' => 'building_id']);
    }

    /**
     * {@inheritdoc}
     * @return BdocQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BdocQuery(get_called_class());
    }
}
