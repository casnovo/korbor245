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

$this->title = 'บันทึกทะเบียนส่ง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sarabunout-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('บันทึกทะเบียนส่ง', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         ///   ['class' => 'yii\grid\SerialColumn'],

          ///  'idsarabun',
            'binid',
            'bdate',
            'details',
            'note',
            [
                'attribute' => 'data',
                'label' => 'เอกสาร',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->data,'http://'.$model->data); // your url here
                },
            ],

           /// [
           ///     'attribute' => 'bloc_idbloc',
           ///     'filter' => ArrayHelper::map(Bloc::find()->all(), 'idbloc', 'name'),//กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
           ///     'value' => function($model){
           ///         return $model->blocIdbloc->name;
           ///     }
           /// ],
          ///  [
          ///      'attribute' => 'entryagency_identryagency',
          ///      'filter' => ArrayHelper::map(Entryagency::find()->all(), 'identryagency', 'name'),//กำหนด filter แบบ dropDownlist จากข้อมูล ใน field แบบ foreignKey
           ///     'value' => function($model){
           ///         return $model->entryagencyIdentryagency->name;
           ///     }
         ///   ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idsarabun' => $model->idsarabun]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
