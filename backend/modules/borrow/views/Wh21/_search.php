<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Wh21Seaech */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wh21-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idwh21') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'kind') ?>

    <?= $form->field($model, 'sn') ?>

    <?= $form->field($model, 'copsn') ?>

    <?php // echo $form->field($model, 'statas') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'position') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
