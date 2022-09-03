<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Force */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="force-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idforce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forcerang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forcename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forcesurname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forcebank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forceunit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
