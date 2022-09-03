<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Wh21 */

$this->title = 'Update Wh 21: ' . $model->idwh21;
$this->params['breadcrumbs'][] = ['label' => 'Wh 21s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idwh21, 'url' => ['view', 'idwh21' => $model->idwh21]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wh21-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
