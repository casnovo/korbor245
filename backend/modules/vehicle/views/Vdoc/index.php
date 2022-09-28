<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vehicle\models\VdocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เอกสาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vdoc-index">
    <p>
        <?= Html::a('เพิ่มเอกสาร', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
          //  'doc',
            'docurl:url',
            [
                'attribute'=>'vehicle_id',
                'label'=>'ทะเบียนรถ',
                'format'=>'text',//raw, html
                'content'=>function($data){
                    return $data->getCarreg();
                }
            ],
           // 'vehicle.carregistration',
            //'docformat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
