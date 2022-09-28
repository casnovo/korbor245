<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\land\models\Land;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Building */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="building-form">

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">บันทึกข้อมูลที่ดิน</h3>
        </div>

        <div class="card-body">

            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=> 'form-control form-control-sm']) ?>
                    <div class="form-group">

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'status')->dropdownList([

                            'ขึ้นทะเบียนอาคารแล้ว' => 'ขึ้นทะเบียนอาคารแล้ว',
                            'ยังไม่ขึ้นทะเบียนอาคาร' => 'ยังไม่ขึ้นทะเบียนอาคาร',

                        ],['class'=> 'form-control form-control-sm','maxlength' => true]
                        ); ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?= $form->field($model, 'namecode')->textInput(['maxlength' => true,'class'=> 'form-control form-control-sm']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <?= $form->field($model, 'status2')->dropdownList([

                            'สามารถใช้งานได้' => 'สามารถใช้งานได้',
                            'ไม่มีผู้ใช้งาน' => 'ไม่มีผู้ใช้งาน',
                            'ชำรุดสามารถใช้งานได้บางส่วน' => 'ชำรุดสามารถใช้งานได้บางส่วน',
                            'ชำรุดไม่สามารถใช้งานได้' => 'ชำรุดไม่สามารถใช้งานได้',

                        ],['class'=> 'form-control form-control-sm','maxlength' => true]
                        ); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'land_id')->dropdownList(
                            ArrayHelper::map(land::find() -> all(),'id',function($model) {
                                return $model['landkind'].'-'.$model['landname'];
                            }),
                            ['class'=> 'form-control form-control-sm']
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*'],
                        ]); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?= $form->field($model, 'pics[]')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*','multiple' => true],
                        ]); ?>
                    </div>
                </div>
            </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
