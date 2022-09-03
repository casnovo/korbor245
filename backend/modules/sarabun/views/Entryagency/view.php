<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Entryagency */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Entryagencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entryagency-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'identryagency' => $model->identryagency], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'identryagency' => $model->identryagency], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'identryagency',
            'name',
        ],
    ]) ?>

</div>
