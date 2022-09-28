<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrow24 */

$this->title = 'Create Borrow 24';
$this->params['breadcrumbs'][] = ['label' => 'Borrow 24s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrow24-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
