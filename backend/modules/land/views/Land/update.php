<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Land */

$this->title = 'แก้ใขข้อมูล: ' . $model->id.'   '.$model->landname;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลที่ดิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id.'   '.$model->landname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ใขข้อมูล';
?>
<div class="land-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
