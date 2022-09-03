<?php

namespace backend\modules\sarabun\models;

use Yii;

/**
 * This is the model class for table "sarabunin".
 *
 * @property int $idsarabun ทะเบียนหนังสือรับ
 * @property string $binid ที่หนังสือ
 * @property string $bdate ลงวันที่
 * @property string $details เรื่อง
 * @property string|null $note หมายเหตุ
 * @property string $data เอกสาร
 * @property int $bloc_idbloc แฟ้ม
 * @property int $entryagency_identryagency หน่วยงานผู้ส่ง
 *
 * @property Bloc $blocIdbloc
 * @property Entryagency $entryagencyIdentryagency
 */
class Sarabunin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sarabunin';
    }
    public $file;
    public $kind;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bdate', 'details', 'data', 'bloc_idbloc', 'entryagency_identryagency','kind'], 'required'],
            [['bdate'], 'safe'],
            [['bloc_idbloc', 'entryagency_identryagency'], 'integer'],
            [['binid',], 'string', 'max' => 45],
            [['file'],'file'],
            [['kind'], 'string', 'max' => 3],
            [['details', 'note', 'data'], 'string', 'max' => 100],
            [['bloc_idbloc'], 'exist', 'skipOnError' => true, 'targetClass' => Bloc::className(), 'targetAttribute' => ['bloc_idbloc' => 'idbloc']],
            [['entryagency_identryagency'], 'exist', 'skipOnError' => true, 'targetClass' => Entryagency::className(), 'targetAttribute' => ['entryagency_identryagency' => 'identryagency']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsarabun' => 'ทะเบียนหนังสือรับ',
            'binid' => 'ที่หนังสือ',
            'bdate' => 'ลงวันที่',
            'details' => 'เรื่อง',
            'note' => 'หมายเหตุ',
            'data' => 'เอกสาร',
            'bloc_idbloc' => 'แฟ้ม',
            'entryagency_identryagency' => 'หน่วยงานผู้ส่ง',
            'file' => 'อัพโหลดเอกสาร',
            'kind' => 'ชนิดเอกสาร',

        ];
    }

    /**
     * Gets query for [[BlocIdbloc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlocIdbloc()
    {
        return $this->hasOne(Bloc::className(), ['idbloc' => 'bloc_idbloc']);
    }

    /**
     * Gets query for [[EntryagencyIdentryagency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntryagencyIdentryagency()
    {
        return $this->hasOne(Entryagency::className(), ['identryagency' => 'entryagency_identryagency']);
    }
}
