<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
///use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sarabun\models\BlocinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการแฟ้ม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blocin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('สร้างแฟ้ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idbloc',
            'name',
            'detail',
            'datarefer:url',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idbloc' => $model->idbloc]);
                 }
            ],
        ],
    ]); ?>


</div>
