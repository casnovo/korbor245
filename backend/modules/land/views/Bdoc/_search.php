<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\BdocSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bdoc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'doc') ?>

    <?= $form->field($model, 'docurl') ?>

    <?= $form->field($model, 'docformat') ?>

    <?php // echo $form->field($model, 'createat') ?>

    <?php // echo $form->field($model, 'updateat') ?>

    <?php // echo $form->field($model, 'building_id') ?>

    <?php // echo $form->field($model, 'recorder') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
