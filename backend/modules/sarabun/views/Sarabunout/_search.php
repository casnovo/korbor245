<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\SarabunoutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sarabunout-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idsarabun') ?>

    <?= $form->field($model, 'binid') ?>

    <?= $form->field($model, 'bdate') ?>

    <?= $form->field($model, 'details') ?>

    <?= $form->field($model, 'note') ?>

    <?php  echo $form->field($model, 'data') ?>

    <?php  echo $form->field($model, 'bloc_idbloc') ?>

    <?php  echo $form->field($model, 'entryagency_identryagency') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
