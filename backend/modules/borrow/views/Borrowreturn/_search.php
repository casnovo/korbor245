<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\BorrowreturnSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="borrowreturn-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idbr') ?>

    <?= $form->field($model, 'force_idforce') ?>

    <?= $form->field($model, 'wh21_idwh21') ?>

    <?= $form->field($model, 'docbor') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'docreturn') ?>

    <?php // echo $form->field($model, 'borrowdate') ?>

    <?php // echo $form->field($model, 'returndate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
