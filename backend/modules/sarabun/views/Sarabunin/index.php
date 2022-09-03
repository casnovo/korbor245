<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sarabun\models\SarabuninSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บันทีกทะเบียนรับ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sarabunin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('[บันทึกทะเบียนรับ]', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

           // 'idsarabun',
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
            //'bloc_idbloc',
            //'entryagency_identryagency',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idsarabun' => $model->idsarabun]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
