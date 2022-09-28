<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Ldoc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ldoc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'docurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'docformat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createat')->textInput() ?>

    <?= $form->field($model, 'updateat')->textInput() ?>

    <?= $form->field($model, 'land_id')->textInput() ?>

    <?= $form->field($model, 'recorder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'editor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
