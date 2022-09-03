<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\sarabunout */

$this->title = 'แก้ใขบันทึกทะเบียนส่ง: ' . $model->idsarabun;
$this->params['breadcrumbs'][] = ['label' => 'บันทึกทะเบียนส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsarabun, 'url' => ['view', 'idsarabun' => $model->idsarabun]];
$this->params['breadcrumbs'][] = 'แก้ใขบันทึกทะเบียนส่ง';
?>
<div class="sarabunout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
