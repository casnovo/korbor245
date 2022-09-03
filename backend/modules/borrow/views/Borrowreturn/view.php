<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrowreturn */

$this->title = $model->idbr;
$this->params['breadcrumbs'][] = ['label' => 'Borrowreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="borrowreturn-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idbr' => $model->idbr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idbr' => $model->idbr], [
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
            'idbr',
            'force_idforce',
            'wh21_idwh21',
            'docbor',
            'status',
            'docreturn',
            'borrowdate',
            'returndate',
        ],
    ]) ?>

</div>
