<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\sarabunin */

$this->title = 'แก้ใขทะเบียนรับ: ' . $model->idsarabun;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนรับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsarabun, 'url' => ['view', 'idsarabun' => $model->idsarabun]];
$this->params['breadcrumbs'][] = 'แก้ใขทะเบียนรับ';
?>
<div class="sarabunin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
