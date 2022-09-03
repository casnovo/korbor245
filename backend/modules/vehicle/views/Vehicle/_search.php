<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\VehicleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'enginenumber') ?>

    <?= $form->field($model, 'bodynumber') ?>

    <?php // echo $form->field($model, 'carregistration') ?>

    <?php // echo $form->field($model, 'documents') ?>

    <?php // echo $form->field($model, 'doc2') ?>

    <?php // echo $form->field($model, 'doc3') ?>

    <?php // echo $form->field($model, 'vstatus') ?>

    <?php // echo $form->field($model, 'vpic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
