<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\sarabunin */

$this->title = 'บันทึกทะเบียนรับ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนรับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sarabunin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
