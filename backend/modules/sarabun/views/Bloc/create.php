<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Blocin */

$this->title = 'สร้างแฟ้ม';
$this->params['breadcrumbs'][] = ['label' => 'แฟ้ม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blocin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
