<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrowreturn */

$this->title = 'Create Borrowreturn';
$this->params['breadcrumbs'][] = ['label' => 'Borrowreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowreturn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
