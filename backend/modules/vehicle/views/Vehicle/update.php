<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vehicle */

$this->title = 'แก้ใขยาพาหะนะ: ' .$model->carregistration;
$this->params['breadcrumbs'][] = ['label' => 'ยานพาหะนะ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
