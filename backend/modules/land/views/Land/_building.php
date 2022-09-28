<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

use yii\widgets\Pjax;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\land\models\BuildingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="building-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class = row>
    <div class = col-2 >
    </div>
    <div class = col-5 >

    </div>
    <div class = col-5 >
        <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">ข้อมูลอาคาร</h4>
            </div>
            <div class="box1">
                <div class="col-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'hover'=> true,
        'tableOptions' =>['class' => 'table table-sm table-striped table-primary'],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'namecode',
            'pic',
           // 'pics',
            //'status',
            //'status2',
            //'land_id',
            //'createat',
            //'updateat',
            //'recorder',
            //'editor',

        ],
    ]); ?>
            </div>
            </div>

        </div>
</div>
</div>

    <?php Pjax::end(); ?>

</div>
