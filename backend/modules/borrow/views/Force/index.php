<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\borrow\models\ForceSeaech */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="force-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Force', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idforce',
            'forcerang',
            'forcename',
            'forcesurname',
            'forcebank',
            //'forceunit',
            //'position',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idforce' => $model->idforce]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
