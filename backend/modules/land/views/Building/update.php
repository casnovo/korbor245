<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Building */

$this->title = 'แก้ใขข้อมูลอาคาร: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลอาคาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ใขข้อมูลอาคาร';
?>
<div class="building-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
