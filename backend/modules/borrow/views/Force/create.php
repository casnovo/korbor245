<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Force */

$this->title = 'Create Force';
$this->params['breadcrumbs'][] = ['label' => 'Forces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="force-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
