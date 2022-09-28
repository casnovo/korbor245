<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vehicle\models\VdocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<div class="vdoc-index">

    <?php Pjax::begin(); ?>
    <?php //  echo $model->; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'docurl:url',
            'vehicle.carregistration',
            //'docformat',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
