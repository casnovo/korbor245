<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\Bloc */

$this->title = 'Create Bloc';
$this->params['breadcrumbs'][] = ['label' => 'Blocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
