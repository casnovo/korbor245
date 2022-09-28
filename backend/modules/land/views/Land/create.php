<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Land */

$this->title = 'บันทึกข้อมูล';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลที่ดิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="land-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
