<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Ldoc */

$this->title = 'Create Ldoc';
$this->params['breadcrumbs'][] = ['label' => 'Ldocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ldoc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
