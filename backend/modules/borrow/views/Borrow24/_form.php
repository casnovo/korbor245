<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrow24 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="borrow24-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'borrowreturn_idbr')->textInput() ?>

    <?= $form->field($model, 'wh24_idwh24')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
