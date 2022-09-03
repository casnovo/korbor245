<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Entryagency */

$this->title = 'Update Entryagency: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Entryagencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'identryagency' => $model->identryagency]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entryagency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
