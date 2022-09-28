<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vdoc */

$this->title = 'เพิ่มเอกสารประจำรถ';
$this->params['breadcrumbs'][] = ['label' => 'Vdocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vdoc-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
