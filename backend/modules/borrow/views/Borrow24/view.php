<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrow24 */

$this->title = $model->borrowreturn_idbr;
$this->params['breadcrumbs'][] = ['label' => 'Borrow 24s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="borrow24-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'borrowreturn_idbr' => $model->borrowreturn_idbr, 'wh24_idwh24' => $model->wh24_idwh24], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'borrowreturn_idbr' => $model->borrowreturn_idbr, 'wh24_idwh24' => $model->wh24_idwh24], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'borrowreturn_idbr',
            'wh24_idwh24',
            'quantity',
        ],
    ]) ?>

</div>
