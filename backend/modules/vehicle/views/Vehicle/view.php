<?php

use yii\helpers\Html;

//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use yii\bootstrap4\Carousel;
use backend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vehicle */

$this->title = $model->id . '.' . $model->brand . $model->model . '     หมายเลขทะเบียน: ' . $model->carregistration;
$this->params['breadcrumbs'][] = ['label' => 'ยานพาหะนะ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<div class="vehicle-view">
    <p>
        <?= Html::a('แก้ใข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('เพิ่มเอกสาร', ['vdoc/create2', 'carid' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('บันทึกยานพาหะนะ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'responsive' => true,

        'mode' => DetailView::MODE_VIEW,
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'panel' => [
            'heading' => 'ข้อมูลยานพาหะนะ # ' . $model->brand . $model->model . '   หมายเลขทะเบียน : ' . $model->carregistration,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            [
                'group' => true,
                'label' => 'ส่วนที่ 1 : ข้อมูลทั่วไป',
                'rowOptions' => ['class' => 'table-info']
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'kind',
                        'label' => 'ประเภท #',
                        'displayOnly' => true,
                        'valueColOptions' => ['style' => 'width:30%']
                    ],
                    [
                        'attribute' => 'brand',
                        'label' => 'Brand #',
                        'valueColOptions' => ['style' => 'width:30%'],
                        'displayOnly' => true
                    ],

                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'model',
                        'label' => 'รุ่น #',
                        'valueColOptions' => ['style' => 'width:30%'],
                        'displayOnly' => true
                    ],
                    [
                        'attribute' => 'carregistration',
                        'label' => 'ทะเบียนรถ #',
                        'valueColOptions' => ['style' => 'width:30%'],
                        'displayOnly' => true
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'enginenumber',
                        'label' => 'หมายเลขเครื่องยนต์ #',
                        'valueColOptions' => ['style' => 'width:30%'],
                        'displayOnly' => true
                    ],
                    [
                        'attribute' => 'bodynumber',
                        'label' => 'หมายเลขตัวถัง #',
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'valueColOptions' => ['style' => 'width:30%'],
                        'displayOnly' => true
                    ],
                ],

            ],
            [
                'columns' => [
                    [
                        'attribute' => 'status',
                        'label' => 'สถานภาพรถ #',
                        'displayOnly' => true,
                        'valueColOptions' => ['style' => 'width:10%']
                    ],
                    [
                        'attribute' => 'detill',
                        'label' => 'รายละเอียดอื่นๆ #',
                        'valueColOptions' => ['style' => 'width:90%'],
                        'displayOnly' => true
                    ],

                ],
            ],
            [
                'group' => true,
                'label' => 'ส่วนที่ 2 : รูปภาพประจำรถ',
                'rowOptions' => ['class' => 'table-danger']
            ],
            /*  [
                  'columns' => [
                      [
                          'attribute'=>'vimg',
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
                        'attribute' => 'vimgs',
                        'format' => 'raw',
                        'value' => '<center>' . Carousel::widget(['items' => $model->getPhotosCarousel()]) . '</center>',
                        'valueColOptions' => ['style' => 'width:100%'],
                        'labelColOptions' => ['style' => 'width:0%'],
                        'displayOnly' => true
                    ],
                ],
            ],

        ]
    ]);
    ?>

