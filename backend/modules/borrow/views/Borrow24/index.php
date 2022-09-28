<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\borrow\models\Borrow24Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Borrow 24s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrow24-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Borrow 24', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'borrowreturn_idbr',
            'wh24_idwh24',
            'quantity',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Borrow24 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'borrowreturn_idbr' => $model->borrowreturn_idbr, 'wh24_idwh24' => $model->wh24_idwh24]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
