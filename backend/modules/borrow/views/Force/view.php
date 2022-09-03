<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Force */

$this->title = $model->idforce;
$this->params['breadcrumbs'][] = ['label' => 'Forces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="force-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idforce' => $model->idforce], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idforce' => $model->idforce], [
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
            'idforce',
            'forcerang',
            'forcename',
            'forcesurname',
            'forcebank',
            'forceunit',
            'position',
        ],
    ]) ?>

</div>
