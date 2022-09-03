<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrowreturn */

$this->title = 'Update Borrowreturn: ' . $model->idbr;
$this->params['breadcrumbs'][] = ['label' => 'Borrowreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbr, 'url' => ['view', 'idbr' => $model->idbr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="borrowreturn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
