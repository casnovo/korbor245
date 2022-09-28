<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;
use yii\bootstrap4\Carousel;
use backend\assets\AppAsset;
use backend\modules\land\models\Land;
/* @var $this yii\web\View */
/* @var $model backend\modules\land\models\Building */
/* @var $model2 backend\modules\land\models\Building */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลอาคาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<div class="building-view">
    <p>
        <?= Html::a('แก้ใข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?= Html::a('บันทึกข้อมูลอาคารเพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'hover'=>true,
        'responsive'=>true,

        'mode'=>DetailView::MODE_VIEW,
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'panel'=>[
            'heading'=>'ข้อมูลยานพาหะนะ # ' . $model->name.'  ',
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes'=>[
            [
                'group'=>true,
                'label'=>'ส่วนที่ 1 : ข้อมูลทั่วไป',
                'rowOptions'=>['class'=>'table-info']
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'name',
                        'label'=>'ชื่ออาคาร #',
                        'displayOnly'=>true,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'namecode',
                        'label'=>'เลขเอกสารประจำอาคาร #',
                        'valueColOptions'=>['style'=>'width:30%'],
                        'displayOnly'=>true
                    ],

                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'status',
                        'label'=>'สถานะการขึ้นทะเบียน #',
                        'valueColOptions'=>['style'=>'width:30%'],
                        'displayOnly'=>true
                    ],
                    [
                        'attribute'=>'status2',
                        'label'=>'สถานภาพที่ดิน #',
                        'valueColOptions'=>['style'=>'width:30%'],
                        'displayOnly'=>true
                    ],

                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'land_id',
                        'label'=>'ตั้งอยู่บนที่ดิน #',

                        'valueColOptions'=>['style'=>'width:70%'],
                        'displayOnly'=>true
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute'=>'created_at',
                        'label'=>'บันทึกเมื่อ #',
                        'value'=> Yii::$app->thaiFormatter->asDate($model->created_at, 'long').'    ผู้บันทึก:: '.$model->recorder,
                        'displayOnly'=>true,
                        'valueColOptions'=>['style'=>'width:30%']
                    ],
                    [
                        'attribute'=>'updated_at',
                        'label'=>'แก้ใขล่าสุดเมื่อ #',
                        'value'=>Yii::$app->thaiFormatter->asDate($model->updated_at, 'long').'    ผู้แก้ใข:: '.$model->editor,
                        'valueColOptions'=>['style'=>'width:30%'],
                        'displayOnly'=>true
                    ],

                ],
            ],
            [
                'group'=>true,
                'label'=>'ส่วนที่ 2 : รูปภาพประจำที่ดิน',
                'rowOptions'=>['class'=>'table-danger']
            ],
            /*  [
                  'columns' => [
                      [
                          'attribute'=>'landpic',
                          'format'=>'raw',
                          'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail','style'=>'width:300px;','align'=>'center']),
                          'valueColOptions'=>['style'=>'width:30%'],
                          'labelColOptions'=>['style'=>'width:0%'],

                          'displayOnly'=>true
                      ],
                  ],
              ],*/

            [
                'columns' => [
                    [
                        'attribute'=>'pics',
                        'format'=>'raw',
                        'value'=>'<center>'. Carousel::widget(['items'=>$model->getPhotosCarousel()]).'</center>',
                        'valueColOptions'=>['style'=>'width:100%'],
                        'labelColOptions'=>['style'=>'width:0%'],
                        'displayOnly'=>true
                    ],
                ],
            ],

        ]
    ]);
    ?>


</div>
