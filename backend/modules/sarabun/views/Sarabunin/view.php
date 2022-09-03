<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\sarabunin */

$this->title = 'ทะเบียนรับที่'.'  '.$model->idsarabun;
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนรับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sarabunin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ใข', ['update', 'idsarabun' => $model->idsarabun], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'idsarabun' => $model->idsarabun], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ต้องการลบใช่ใหม?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('บันทึกทะเบียนรับ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsarabun',
            'binid',
            'bdate',
            'details',
            'note',
            'data',
            'bloc_idbloc',
            'entryagency_identryagency',
        ],
    ]) ?>

</div>
