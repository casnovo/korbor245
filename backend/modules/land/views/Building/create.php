<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Building */

$this->title = 'เพิ่มข้อมูลอาคาร';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลอาคาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
