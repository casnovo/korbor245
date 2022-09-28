<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrow24 */

$this->title = 'Update Borrow 24: ' . $model->borrowreturn_idbr;
$this->params['breadcrumbs'][] = ['label' => 'Borrow 24s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->borrowreturn_idbr, 'url' => ['view', 'borrowreturn_idbr' => $model->borrowreturn_idbr, 'wh24_idwh24' => $model->wh24_idwh24]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="borrow24-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
