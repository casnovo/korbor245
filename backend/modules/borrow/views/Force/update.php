<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Force */

$this->title = 'Update Force: ' . $model->idforce;
$this->params['breadcrumbs'][] = ['label' => 'Forces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idforce, 'url' => ['view', 'idforce' => $model->idforce]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="force-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
