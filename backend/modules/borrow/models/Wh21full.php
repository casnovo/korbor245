<?php

namespace backend\modules\borrow\models;

use Yii;

/**
 * This is the model class for table "wh21full".
 *
 * @property int $idwh21
 * @property int $statas
 * @property string $fullname
 */
class Wh21full extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wh21full';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idwh21', 'statas'], 'integer'],
            [['statas'], 'required'],
            [['fullname'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idwh21' => 'Idwh 21',
            'statas' => 'Statas',
            'fullname' => 'Fullname',
        ];
    }

    /**
     * {@inheritdoc}
     * @return Wh21fullQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Wh21fullQuery(get_called_class());
    }
}
