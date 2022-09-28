<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use backend\modules\vehicle\models\VdocSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vehicle\models\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ยานพาหะนะ';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="vehicle-index">

    <p>
        <?= Html::a('บันทึกยานพาหะนะ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=> function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column){
                    $searchModel =new VdocSearch();
                    $searchModel->vehicle_id = $model->id;   // [b]here is the problem [/b]
                    $dataProvider=$searchModel->search(yii::$app->request->queryParams);
                    return Yii::$app->controller->renderPartial('_vdoc',[
                        'searchModel'=>$searchModel,
                        'dataProvider'=>$dataProvider,
                    ]);
                }
            ],
            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'vimg',
                'value'=>function($model){
                    return Html::tag('div','',[
                        'style'=>'width:150px;height:150px;
                          border-top: 10px solid rgba(255, 255, 255, .46);
                          background-image:url('.$model->photoViewer.');
                          background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
                          ']);
                }
            ],
            [
                'attribute' => 'brand',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ],
            [
                'attribute' => 'model',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ],
      /*     [
                'attribute' => 'enginenumber',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ],
            [
                'attribute' => 'bodynumber',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ], */
            [
                'attribute' => 'carregistration',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ],
            [
                'attribute' => 'status',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ],
            [
                'attribute' => 'kind',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],

            ],
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status2',
                'vAlign' => 'middle',
                'trueLabel' => 'ใช้งานได้',
                'falseLabel' => 'ชำรุด',
                'options' => ['style' => 'width:10%'],
            ],

            //'detill',
            [
                'class' => ActionColumn::className(),
                'options' => ['style' => 'width:10%'],

                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
