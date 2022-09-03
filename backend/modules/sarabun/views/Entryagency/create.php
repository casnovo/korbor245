<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Entryagency */

$this->title = 'Create Entryagency';
$this->params['breadcrumbs'][] = ['label' => 'Entryagencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entryagency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
