<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vdoc */

$this->title = 'เพิ่มเอกสาร';
$this->params['breadcrumbs'][] = ['label' => 'เอกสาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vdoc-create">
    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
