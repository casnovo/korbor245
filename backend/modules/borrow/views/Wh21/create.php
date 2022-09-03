<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Wh21 */

$this->title = 'Create Wh 21';
$this->params['breadcrumbs'][] = ['label' => 'Wh 21s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wh21-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
