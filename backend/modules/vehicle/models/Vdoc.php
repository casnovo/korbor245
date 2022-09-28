<?php

namespace backend\modules\vehicle\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "vdoc".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $doc
 * @property string|null $docurl
 * @property int $vehicle_id
 * @property string|null $docformat
 *
 * @property Vehicle $vehicle
 */
class Vdoc extends \yii\db\ActiveRecord
{
    public $upload_foler ='vupload';
    public $temp_foler ='temp';
    public $pdf_url ='backend.test';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vdoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id'], 'required'],
            [['vehicle_id'], 'integer'],
            [['name', 'doc', 'docurl'], 'string', 'max' => 100],
            [['docformat'], 'string', 'max' => 45],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'หัวข้อเอกสาร',
            'doc' => 'เอกสาร',
            'docurl' => 'Docurl',
            'vehicle_id' => 'ทะบียนรถ',
            'docformat' => 'Docformat',
        ];
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery|VehicleQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::className(), ['id' => 'vehicle_id']);
    }
    public function getCarreg(){
        $model=$this->vehicle;
        return $model?$model->carregistration:'';
    }

    /**
     * {@inheritdoc}
     * @return VdocQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VdocQuery(get_called_class());
    }
    public function getLogo(){
        return Yii::getAlias('@web').'/'.$this->temp_foler.'/';
    }
    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($photo->saveAs($path.$fileName)){
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
    }

    public function getUploadUrl(){
        return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }
    public function getPdfurl(){
        return $this->pdf_url.Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }

    public function getPhotoViewer(){
        return empty($this->vimg) ? Yii::getAlias('@web').'/vupload/none.png' : $this->getUploadUrl().$this->vimg;
    }
    public function getExtension($model,$attribute){
        $photo  = UploadedFile::getInstance($model, $attribute);
        $fileName = $photo->extension;
        return $fileName;
    }
}
