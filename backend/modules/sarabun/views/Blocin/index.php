<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\bs4dropdown\Dropdown;
use backend\modules\sarabun\models\SarabuninSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sarabun\models\BlocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'แฟ้มเอกสารรับ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloc-index">

    <h1><?= Html::encode($this->title) ?></h1>



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
                $searchModel =new SarabuninSearch();
                $searchModel->bloc_idbloc = $model->idbloc;   // [b]here is the problem [/b]
                $dataProvider=$searchModel->search(yii::$app->request->queryParams);
                 return Yii::$app->controller->renderPartial('_sarabunin',[
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
