<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Bloc */

$this->title = 'Update Bloc: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'idbloc' => $model->idbloc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bloc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
