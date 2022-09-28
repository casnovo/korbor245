<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Bdoc */

$this->title = 'Create Bdoc';
$this->params['breadcrumbs'][] = ['label' => 'Bdocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bdoc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
