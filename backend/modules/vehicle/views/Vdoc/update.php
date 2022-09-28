<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vdoc */

$this->title = 'แก้ใข: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'เอกสาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vdoc-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
