<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vehicle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enginenumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bodynumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carregistration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documents')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vstatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vpic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
