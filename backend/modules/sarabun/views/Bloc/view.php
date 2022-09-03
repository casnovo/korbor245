<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Bloc */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'แฟ้ม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blocin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ใข', ['update', 'idbloc' => $model->idbloc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'idbloc' => $model->idbloc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ลบใช่ใหม?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('สร้างแฟ้ม', ['create'], ['class' => 'btn btn-success']) ?>
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
