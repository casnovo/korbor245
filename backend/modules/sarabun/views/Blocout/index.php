<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use backend\modules\sarabun\models\SarabunoutSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sarabun\models\BlocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'แฟ้มเอกสารส่ง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloc-index">



    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

           [
            'class'=>'kartik\grid\ExpandRowColumn',
            'value'=> function($model, $key, $index, $column){
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column){
                $searchModel =new SarabunoutSearch();
                $searchModel->bloc_idbloc = $model->idbloc;   // [b]here is the problem [/b]
                $dataProvider=$searchModel->search(yii::$app->request->queryParams);
                 return Yii::$app->controller->renderPartial('_sarabunout',[
                    'searchModel'=>$searchModel,
                    'dataProvider'=>$dataProvider,
                    ]);
                    }
            ],

            'idbloc',
            'name',
            'detail',
            'datarefer',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
