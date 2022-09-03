<?php

namespace backend\modules\vehicle\models;

use Yii;

/**
 * This is the model class for table "vehicleborrow".
 *
 * @property int $id ลำดับ
 * @property string|null $name ชื่อผู้เบิก
 * @property string|null $rank ตำแหน่ง
 * @property string|null $mission ภารกิจ
 * @property string|null $doc เอกสารการยืม
 * @property string|null $doc2 เอกสารการคืน
 * @property int $vehicle_id ยาพาหะนะที่เบิก
 * @property string|null $dates
 *
 * @property Vehicle $vehicle
 */
class Vehicleborrow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicleborrow';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id'], 'required'],
            [['id', 'vehicle_id'], 'integer'],
            [['dates'], 'safe'],
            [['name', 'rank', 'mission', 'doc', 'doc2'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับ',
            'name' => 'ชื่อผู้เบิก',
            'rank' => 'ตำแหน่ง',
            'mission' => 'ภารกิจ',
            'doc' => 'เอกสารการยืม',
            'doc2' => 'เอกสารการคืน',
            'vehicle_id' => 'ยาพาหะนะที่เบิก',
            'dates' => 'Dates',
        ];
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }
}
