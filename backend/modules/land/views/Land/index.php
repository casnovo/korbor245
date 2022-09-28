<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use backend\modules\land\models\Land;
use backend\modules\land\models\Building;
use backend\modules\land\models\LdocSearch;
use kartik\grid\DataColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\land\models\LandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลที่ดิน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-index">


    <p>
        <?= Html::a('บันทึกข้อมูล', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
           // ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'columns' => [

                // ['class' => 'yii\grid\SerialColumn'],
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'expandTitle'=>'ทดสอบ',
                    'value'=> function($model, $key, $index, $column){
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column){
                        $searchModel =new ldocSearch();
                        $searchModel->land_id = $model->id;   // [b]here is the problem [/b]
                        $dataProvider=$searchModel->search(yii::$app->request->queryParams);
                        return Yii::$app->controller->renderPartial('_building',[
                            'searchModel'=>$searchModel,
                            'dataProvider'=>$dataProvider,
                        ]);
                    },


                ],

            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'landpic',
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


            'landname',
            'landaddress',
            'landarea',
                'landkind',
                'landcode',

            //'landpic',

           // 'landpics',
            //'landcode',
            //'landdetill',
            //'landkind',
            //'created_at',
            //'updated_at',
            //'recorder',
            //'editor',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
