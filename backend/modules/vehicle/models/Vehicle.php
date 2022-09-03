<?php

namespace backend\modules\vehicle\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id ลำดับ
 * @property string|null $brand ยี่ห้อ
 * @property string|null $model รุ่น
 * @property string|null $enginenumber หมายเลขเครื่องยนต์
 * @property string|null $bodynumber หมายเลขตัวถัง
 * @property string|null $carregistration ทะเบียน
 * @property string|null $documents เอกสารประจำรถ
 * @property string|null $doc2 เอกสารการได้มา
 * @property string|null $doc3 เอกสารการคืน
 * @property string|null $vstatus สถานะภาพปัจจุบัน
 * @property string|null $vpic
 *
 * @property Vehicleborrow[] $vehicleborrows
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'enginenumber', 'bodynumber', 'carregistration', 'documents', 'doc2', 'doc3', 'vstatus', 'vpic'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ลำดับ',
            'brand' => 'ยี่ห้อ',
            'model' => 'รุ่น',
            'enginenumber' => 'หมายเลขเครื่องยนต์',
            'bodynumber' => 'หมายเลขตัวถัง',
            'carregistration' => 'ทะเบียน',
            'documents' => 'เอกสารประจำรถ',
            'doc2' => 'เอกสารการได้มา',
            'doc3' => 'เอกสารการคืน',
            'vstatus' => 'สถานะภาพปัจจุบัน',
            'vpic' => 'Vpic',
        ];
    }

    /**
     * Gets query for [[Vehicleborrows]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleborrows()
    {
        return $this->hasMany(Vehicleborrow::className(), ['vehicle_id' => 'id']);
    }
}
