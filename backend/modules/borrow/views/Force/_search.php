<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\ForceSeaech */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="force-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idforce') ?>

    <?= $form->field($model, 'forcerang') ?>

    <?= $form->field($model, 'forcename') ?>

    <?= $form->field($model, 'forcesurname') ?>

    <?= $form->field($model, 'forcebank') ?>

    <?php // echo $form->field($model, 'forceunit') ?>

    <?php // echo $form->field($model, 'position') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
