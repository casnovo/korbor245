<?php

namespace backend\modules\land\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "land".
 *
 * @property int $id ลำดับ
 * @property string $landname ที่ดิน
 * @property string $landaddress ที่ตั้ง
 * @property string $landlat พิกัด lat
 * @property string $landlong พิกัด long
 * @property string $landarea เนื้อที่ขนาด
 * @property string|null $landpic รูปภาพ
 * @property string|null $landpics รูปทั้งหมด
 * @property string|null $landcode เลขที่ดิน
 * @property string|null $landdetill รายละเอียด
 * @property string $landkind ชนิดที่ดิน
 * @property int|null $created_at วันที่สร้างข้อมูล
 * @property int|null $updated_at แก้ใขครั้งล่าสุด
 * @property string|null $recorder ผู้บันทึก
 * @property string|null $editor ผู้แก้ใข
 *
 * @property Building[] $buildings
 * @property Ldoc[] $ldocs
 */
class Land extends \yii\db\ActiveRecord
{
    public $upload_foler ='landupload';
    public $temp_foler ='temp';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'land';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['landname', 'landaddress', 'landarea', 'landkind'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['landname', 'landcode', 'recorder', 'editor'], 'string', 'max' => 100],
            [['landaddress'], 'string', 'max' => 300],
            [['landlat', 'landlong', 'landarea', 'landkind'], 'string', 'max' => 45],
            [['landdetill'], 'string', 'max' => 400],
            [['landpic'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ],
            [['landpics'], 'file',
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
            'landname' => 'ที่ดิน',
            'landaddress' => 'ที่ตั้ง',
            'landlat' => 'พิกัด lat',
            'landlong' => 'พิกัด long',
            'landarea' => 'เนื้อที่ขนาด',
            'landpic' => 'รูปภาพ',
            'landpics' => 'รูปทั้งหมด',
            'landcode' => 'เลขที่เอกสารที่ดิน',
            'landdetill' => 'รายละเอียด',
            'landkind' => 'ชนิดที่ดิน',
            'created_at' => 'วันที่สร้างข้อมูล',
            'updated_at' => 'แก้ใขครั้งล่าสุด',
            'recorder' => 'ผู้บันทึก',
            'editor' => 'ผู้แก้ใข',
        ];
    }

    /**
     * Gets query for [[Buildings]].
     *
     * @return \yii\db\ActiveQuery|BuildingQuery
     */
    public function getBuildings()
    {
        return $this->hasMany(Building::className(), ['land_id' => 'id']);
    }

    /**
     * Gets query for [[Ldocs]].
     *
     * @return \yii\db\ActiveQuery|LdocQuery
     */
    public function getLdocs()
    {
        return $this->hasMany(Ldoc::className(), ['land_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LandQuery(get_called_class());
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
        return empty($this->landpic) ? Yii::getAlias('@web').'/landupload/none.png' : $this->getUploadUrl().$this->landpic;
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
        $photos = $this->landpics ? @explode(',',$this->landpics) : [];
        $img = '';
        foreach ($photos as  $photo) {
            $img.= ' '.Html::img($this->getUploadUrl().$photo,['class'=>'img-thumbnail','style'=>'max-width:300px;']);
        }
        return $img;
    }

    public function getPhotosCarousel(){
        $photos = $this->landpics ? @explode(',',$this->landpics) : [];
        $img = array();
        foreach ($photos as  $photo) {
            $img[] = Html::img($this->getUploadUrl().$photo,['style'=>'max-width:800px;']);
        }

        return $img;
    }

    public function getOwnPhotosToArray()
    {
        return $this->getOldAttribute('landpics') ? @explode(',',$this->getOldAttribute('landpics')) : [];
    }
}
