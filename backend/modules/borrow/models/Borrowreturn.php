<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "borrowreturn".
 *
 * @property int $idbr ทะเบียนเบิก
 * @property string $force_idforce ผู้เบิก
 * @property int $wh21_idwh21 อาวุธปืนเบิกที่เบิก
 * @property string|null $docbor เอกสารเบิก
 * @property int $status สถานะการเบิก
 * @property string|null $docreturn เอกสารคืน
 * @property string $borrowdate วันที่เบิก
 * @property string|null $returndate วันที่คืน
 *
 * @property Borrow24[] $borrow24s
 * @property Borrow51[] $borrow51s
 * @property Borrow52[] $borrow52s
 * @property Force $forceIdforce
 * @property Wh21 $wh21Idwh21
 * @property Wh24[] $wh24Idwh24s
 * @property Wh51[] $wh51Idwh24s
 * @property Wh52[] $wh52Idwh24s
 */
class Borrow extends \yii\db\ActiveRecord
{
    public $items;
//...
}
class Borrowreturn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrowreturn';
    }
    public $f1;
    public $f2;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['force_idforce', 'wh21_idwh21', 'status', 'borrowdate'], 'required'],
            [['wh21_idwh21', 'status'], 'integer'],
            [['borrowdate', 'returndate'], 'safe'],
            [['f1','f2'],'file'],
            [['force_idforce'], 'string', 'max' => 13],
            [['docbor', 'docreturn'], 'string', 'max' => 45],
            [['force_idforce'], 'exist', 'skipOnError' => true, 'targetClass' => Force::className(), 'targetAttribute' => ['force_idforce' => 'idforce']],
            [['wh21_idwh21'], 'exist', 'skipOnError' => true, 'targetClass' => Wh21::className(), 'targetAttribute' => ['wh21_idwh21' => 'idwh21']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbr' => 'ทะเบียนเบิก',
            'force_idforce' => 'ผู้เบิก',
            'wh21_idwh21' => 'อาวุธปืนเบิกที่เบิก',
            'docbor' => 'เอกสารเบิก',
            'status' => 'สถานะการเบิก',
            'docreturn' => 'เอกสารคืน',
            'borrowdate' => 'วันที่เบิก',
            'returndate' => 'วันที่คืน',
        ];
    }

    /**
     * Gets query for [[Borrow24s]].
     *
     * @return \yii\db\ActiveQuery|borrow24Query
     */
    public function getBorrow24s()
    {
        return $this->hasMany(Borrow24::className(), ['borrowreturn_idbr' => 'idbr']);
    }

    /**
     * Gets query for [[Borrow51s]].
     *
     * @return \yii\db\ActiveQuery|borrow51Query
     */
    public function getBorrow51s()
    {
        return $this->hasMany(Borrow51::className(), ['borrowreturn_idbr' => 'idbr']);
    }

    /**
     * Gets query for [[Borrow52s]].
     *
     * @return \yii\db\ActiveQuery|Borrow52Query
     */
    public function getBorrow52s()
    {
        return $this->hasMany(Borrow52::className(), ['borrowreturn_idbr' => 'idbr']);
    }

    /**
     * Gets query for [[ForceIdforce]].
     *
     * @return \yii\db\ActiveQuery|ForceQuery
     */
    public function getForceIdforce()
    {
        return $this->hasOne(Force::className(), ['idforce' => 'force_idforce']);
    }

    /**
     * Gets query for [[Wh21Idwh21]].
     *
     * @return \yii\db\ActiveQuery|Wh21Query
     */
    public function getWh21Idwh21()
    {
        return $this->hasOne(Wh21::className(), ['idwh21' => 'wh21_idwh21']);
    }

    /**
     * Gets query for [[Wh24Idwh24s]].
     *
     * @return \yii\db\ActiveQuery|Wh24Query
     */
    public function getWh24Idwh24s()
    {
        return $this->hasMany(Wh24::className(), ['idwh24' => 'wh24_idwh24'])->viaTable('borrow24', ['borrowreturn_idbr' => 'idbr']);
    }

    /**
     * Gets query for [[Wh51Idwh24s]].
     *
     * @return \yii\db\ActiveQuery|Wh51Query
     */
    public function getWh51Idwh24s()
    {
        return $this->hasMany(Wh51::className(), ['idwh24' => 'wh51_idwh24'])->viaTable('borrow51', ['borrowreturn_idbr' => 'idbr']);
    }

    /**
     * Gets query for [[Wh52Idwh24s]].
     *
     * @return \yii\db\ActiveQuery|Wh52Query
     */
    public function getWh52Idwh24s()
    {
        return $this->hasMany(Wh52::className(), ['idwh24' => 'wh52_idwh24'])->viaTable('borrow52', ['borrowreturn_idbr' => 'idbr']);
    }

    /**
     * {@inheritdoc}
     * @return BorrowreturnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BorrowreturnQuery(get_called_class());
    }
}
