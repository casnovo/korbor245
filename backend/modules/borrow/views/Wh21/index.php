<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\borrow\models\Wh21Seaech */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wh 21s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wh21-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wh 21', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idwh21',
            'code',
            'kind',
            'sn',
            'copsn',
            //'statas',
            //'img',
            //'position',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idwh21' => $model->idwh21]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
