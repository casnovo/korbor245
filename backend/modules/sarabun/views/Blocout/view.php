<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Bloc */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bloc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idbloc' => $model->idbloc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idbloc' => $model->idbloc], [
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
            'idbloc',
            'name',
            'detail',
            'datarefer',
        ],
    ]) ?>

</div>
