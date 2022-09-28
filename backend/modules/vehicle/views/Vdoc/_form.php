<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\vehicle\models\vehicle;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vdoc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vdoc-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($model, 'name')->dropdownList([

        'เอกสารประจำรถ' => 'เอกสารประจำรถ',
        'เอกสารการได้มา' => 'เอกสารการได้มา',
        'เอกสารการส่งคืน' => 'เอกสารการส่งคืน',
        'เอกสารการเบิกยืม' => 'เอกสารการเบิกยืม',
        'เอกสารการคืน' => 'เอกสารการคืน',
    ],
    ); ?>


    <?= $form->field($model, 'doc')->widget(FileInput::classname(), [

    ]); ?>



    <?= $form->field($model, 'vehicle_id')->dropdownList(
        ArrayHelper::map(vehicle::find() -> all(),'id','carregistration')
        ,
    /// ['prompt'=>'หน่วยงานผู้รับ']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
