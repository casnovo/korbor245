<?php

namespace backend\modules\land\models;

use Yii;

/**
 * This is the model class for table "ldoc".
 *
 * @property int $id ลำดับ
 * @property string|null $name ชื่อเอกสาร
 * @property string|null $doc เอกสาร
 * @property string|null $docurl ที่อยู่เอกสาร
 * @property string|null $docformat ชนืดเอกสาร
 * @property string|null $createat สร้างเมื่อ
 * @property string|null $updateat แก้ใขเมื่อ
 * @property int $land_id
 * @property string|null $recorder
 * @property string|null $editor
 *
 * @property Land $land
 */
class Ldoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ldoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createat', 'updateat'], 'safe'],
            [['land_id'], 'required'],
            [['land_id'], 'integer'],
            [['name', 'doc', 'docurl', 'recorder', 'editor'], 'string', 'max' => 100],
            [['docformat'], 'string', 'max' => 45],
            [['land_id'], 'exist', 'skipOnError' => true, 'targetClass' => Land::className(), 'targetAttribute' => ['land_id' => 'id']],
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
            'land_id' => 'Land ID',
            'recorder' => 'Recorder',
            'editor' => 'Editor',
        ];
    }

    /**
     * Gets query for [[Land]].
     *
     * @return \yii\db\ActiveQuery|LandQuery
     */
    public function getLand()
    {
        return $this->hasOne(Land::className(), ['id' => 'land_id']);
    }

    /**
     * {@inheritdoc}
     * @return LdocQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LdocQuery(get_called_class());
    }
}
