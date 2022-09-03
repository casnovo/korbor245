<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Blocin */

$this->title = 'แก้ใขแฟ้ม: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blocins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'idbloc' => $model->idbloc]];
$this->params['breadcrumbs'][] = 'แก้ใขแฟ้ม';
?>
<div class="blocin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
