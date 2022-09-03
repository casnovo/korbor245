<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Wh21 */

$this->title = $model->idwh21;
$this->params['breadcrumbs'][] = ['label' => 'Wh 21s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wh21-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idwh21' => $model->idwh21], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idwh21' => $model->idwh21], [
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
            'idwh21',
            'code',
            'kind',
            'sn',
            'copsn',
            'statas',
            'img',
            'position',
        ],
    ]) ?>

</div>
