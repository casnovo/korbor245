<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\sarabunout */

$this->title = 'บันทึกทะเบียนส่ง';
$this->params['breadcrumbs'][] = ['label' => 'บันทึกทะเบียนส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sarabunout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
