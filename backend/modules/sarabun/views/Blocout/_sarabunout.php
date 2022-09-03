<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\modules\sarabun\models\Bloc;
use backend\modules\sarabun\models\Entryagency;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sarabun\models\SarabunoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="sarabunin-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'binid',
            'bdate',
            'details',
            'data:url',
            [
                'attribute' => 'entryagency_identryagency',
                'value' => function($model){
                    return $model->entryagencyIdentryagency->name;
                }
            ],

        ],
    ]); ?>



</div>
