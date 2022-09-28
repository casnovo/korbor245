<?php

namespace backend\modules\vehicle\models;

use Yii;
use \yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/**
 * This is the model class for table "vehicle".
 *
 * @property int $id ลำดับ
 * @property string|null $brand ยี่ห้อ
 * @property string|null $model รุ่น
 * @property string|null $enginenumber หมายเลขเครื่องยนต์
 * @property string|null $bodynumber หมายเลขตัวถัง
 * @property string|null $carregistration ทะเบียน
 * @property string $status สถานะภาพ
 * @property string|null $kind ชนิด
 * @property string|null $detill สิ่งของประจำรถ
 * @property string $vimg รูป
 * @property string $vimgs รูป
 * @property string $status2 ใช้การได้
 * @property Vdoc[] $vdocs
 * @property Vehicleborrow[] $vehicleborrows
 */
class Vehicle extends \yii\db\ActiveRecord
{
    public $upload_foler ='vupload';
    public $temp_foler ='temp';
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

            [['brand', 'model', 'enginenumber', 'bodynumber', 'carregistration', 'status', 'kind','status2'], 'string', 'max' => 100],
            [['detill'], 'string', 'max' => 300],
            [['vimg'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ],
            [['vimgs'], 'file',
                'skipOnEmpty' => true,
                'maxFiles' => 5,
                'extensions' => 'png,jpg',

            ]
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
            'status' => 'สถานะภาพ',
            'kind' => 'ชนิด',
            'detill' => 'สิ่งของประจำรถ',
            'vimg' => 'รูป',
            'vimgs' => 'รูปทั้งหมด',
            'status2'=>'สถานะ'
        ];
    }

    /**
     * Gets query for [[Vdocs]].
     *
     * @return \yii\db\ActiveQuery|VdocQuery
     */
    public function getVdocs()
    {
        return $this->hasMany(Vdoc::className(), ['vehicle_id' => 'id']);
    }

    /**
     * Gets query for [[Vehicleborrows]].
     *
     * @return \yii\db\ActiveQuery|VehicleborrowQuery
     */
    public function getVehicleborrows()
    {
        return $this->hasMany(Vehicleborrow::className(), ['vehicle_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return VehicleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VehicleQuery(get_called_class());
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

    public function getPhotoViewer(){
        return empty($this->vimg) ? Yii::getAlias('@web').'/vupload/none.png' : $this->getUploadUrl().$this->vimg;
    }
    public function uploadMultiple($model,$attribute)
    {
        $photos  = UploadedFile::getInstances($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photos !== null) {
            $filenames = [];
            foreach ($photos as $file) {
                $filename = $file->baseName.time() . '.' . $file->extension;
                if($file->saveAs($path . $filename)){
                    $filenames[] = $filename;
                }
            }
            if($model->isNewRecord){
                return implode(',', $filenames);
            }else{
                return implode(',',(ArrayHelper::merge($filenames,$model->getOwnPhotosToArray())));
            }
        }

        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getPhotosViewer(){
        $photos = $this->vimgs ? @explode(',',$this->vimgs) : [];
        $img = '';
        foreach ($photos as  $photo) {
            $img.= ' '.Html::img($this->getUploadUrl().$photo,['class'=>'img-thumbnail','style'=>'max-width:300px;']);
        }
        return $img;
    }

    public function getPhotosCarousel(){
        $photos = $this->vimgs ? @explode(',',$this->vimgs) : [];
            $img = array();
            foreach ($photos as  $photo) {
            $img[] = Html::img($this->getUploadUrl().$photo,['style'=>'max-width:500px;']);
        }

        return $img;
    }

    public function getOwnPhotosToArray()
    {
        return $this->getOldAttribute('vimgs') ? @explode(',',$this->getOldAttribute('vimgs')) : [];
    }
}
