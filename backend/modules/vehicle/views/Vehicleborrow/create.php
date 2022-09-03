<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vehicleborrow */

$this->title = 'Create Vehicleborrow';
$this->params['breadcrumbs'][] = ['label' => 'Vehicleborrows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicleborrow-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
