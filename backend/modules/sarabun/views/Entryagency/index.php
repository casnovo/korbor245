<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sarabun\models\EntryagencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการหน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entryagency-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('เพิ่มหน่วยงาน', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'identryagency',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'identryagency' => $model->identryagency]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
