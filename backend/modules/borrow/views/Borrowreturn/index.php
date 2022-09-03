<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\borrow\models\BorrowreturnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Borrowreturns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowreturn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Borrowreturn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idbr',
            'force_idforce',
            'wh21_idwh21',
            'docbor',
            'status',
            //'docreturn',
            //'borrowdate',
            //'returndate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idbr' => $model->idbr]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
