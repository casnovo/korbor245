<?php

namespace backend\modules\land\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "building".
 *
 * @property int $id ลำดับ
 * @property string $name ชื่ออาคาร
 * @property string|null $namecode ทะเบียนอาคาร
 * @property string|null $pic รูป
 * @property string|null $pics รูปทั้งหมด
 * @property int|null $status สถานะการขึ้นทะเบียน
 * @property resource|null $status2 สถานภาพอาคาร
 * @property int $land_id ที่ตั้งอาคาร
 * @property string|null $created_at สร้างเมื่อ
 * @property string|null $updated_at แก้ใขเมื่อ
 * @property string|null $recorder
 * @property string|null $editor
 *
 * @property Bdoc[] $bdocs
 * @property Land $land
 */
class Building extends \yii\db\ActiveRecord
{
    public $upload_foler ='landupload';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'building';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'land_id'], 'required'],
            [[ 'land_id'], 'integer'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'recorder', 'editor'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 50],
            [['namecode', 'status2'], 'string', 'max' => 45],
            [['pic'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ],
            [['pics'], 'file',
                'skipOnEmpty' => true,
                'maxFiles' => 5,
                'extensions' => 'png,jpg',


            ],
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
            'name' => 'ชื่ออาคาร',
            'namecode' => 'ทะเบียนอาคาร',
            'pic' => 'รูป',
            'pics' => 'รูปทั้งหมด',
            'status' => 'สถานะการขึ้นทะเบียน',
            'status2' => 'สถานภาพอาคาร',
            'land_id' => 'ที่ตั้งอาคาร',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'แก้ใขเมื่อ',
            'recorder' => 'Recorder',
            'editor' => 'Editor',
        ];
    }

    /**
     * Gets query for [[Bdocs]].
     *
     * @return \yii\db\ActiveQuery|BdocQuery
     */
    public function getBdocs()
    {
        return $this->hasMany(Bdoc::className(), ['building_id' => 'id']);
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
     * @return BuildingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BuildingQuery(get_called_class());
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = $photo->baseName.time() . '.' . $photo->extension;
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
        return empty($this->pic) ? Yii::getAlias('@web').'/landupload/none.png' : $this->getUploadUrl().$this->pic;
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
        $photos = $this->pics ? @explode(',',$this->pics) : [];
        $img = '';
        foreach ($photos as  $photo) {
            $img.= ' '.Html::img($this->getUploadUrl().$photo,['class'=>'img-thumbnail','style'=>'max-width:300px;']);
        }
        return $img;
    }

    public function getPhotosCarousel(){
        $photos = $this->pics ? @explode(',',$this->pics) : [];
        $img = array();
        foreach ($photos as  $photo) {
            $img[] = Html::img($this->getUploadUrl().$photo,['style'=>'max-width:800px;']);
        }

        return $img;
    }

    public function getOwnPhotosToArray()
    {
        return $this->getOldAttribute('pics') ? @explode(',',$this->getOldAttribute('pics')) : [];
    }
}
