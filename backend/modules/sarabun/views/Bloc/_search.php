<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\BlocinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blocin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idbloc') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'datarefer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
