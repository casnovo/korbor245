<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\BuildingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="building-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'namecode') ?>

    <?= $form->field($model, 'pic') ?>

    <?= $form->field($model, 'pics') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'status2') ?>

    <?php // echo $form->field($model, 'land_id') ?>

    <?php // echo $form->field($model, 'createat') ?>

    <?php // echo $form->field($model, 'updateat') ?>

    <?php // echo $form->field($model, 'recorder') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
