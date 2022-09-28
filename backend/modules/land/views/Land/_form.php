<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Land */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://kit.fontawesome.com/3167fafa36.js" crossorigin="anonymous"></script>
<div class="land-form">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">บันทึกข้อมูลที่ดิน</h3>
        </div>

        <div class="card-body">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <?= $form->field($model, 'landname')->textInput(['class'=> 'form-control form-control-sm','maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'landarea')->textInput(['class'=> 'form-control form-control-sm','maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <?= $form->field($model, 'landkind')->dropdownList([

                            'ที่ดินสาธารณะประโยชน์' => 'ที่ดินสาธารณะประโยชน์',
                            'ที่ดินราชพัสดุ' => 'ที่ดินราชพัสดุ',
                            'ที่ดินอื่นๆ(หมายเหตุที่รายละเอียด)' => 'ที่ดินอื่นๆ(หมายเหตุที่รายละเอียด)',

                        ],['class'=> 'form-control form-control-sm','maxlength' => true]
                        ); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'landcode')->textInput(['class'=> 'form-control form-control-sm','maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <?= $form->field($model, 'landaddress')->textarea(['class'=> 'form-control form-control-sm','maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'landdetill')->textarea(['class'=> 'form-control form-control-sm','maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <?= $form->field($model, 'landpic')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*'],
                        ]); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'landpics[]')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*','multiple' => true],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group align align-self-lg-center">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success',]) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
    </div>






