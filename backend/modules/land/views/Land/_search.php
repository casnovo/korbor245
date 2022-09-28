<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\LandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="land-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'landname') ?>

    <?= $form->field($model, 'landaddress') ?>

    <?= $form->field($model, 'landlat') ?>

    <?= $form->field($model, 'landlong') ?>

    <?php // echo $form->field($model, 'landarea') ?>

    <?php // echo $form->field($model, 'landpic') ?>

    <?php // echo $form->field($model, 'landpics') ?>

    <?php // echo $form->field($model, 'landcode') ?>

    <?php // echo $form->field($model, 'landdetill') ?>

    <?php // echo $form->field($model, 'landkind') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'recorder') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
