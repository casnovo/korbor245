<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vehicle */

$this->title = 'บันทึกยาพาหะนะ';
$this->params['breadcrumbs'][] = ['label' => 'ยานพาหะนะ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
