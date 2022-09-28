<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\borrow\models\Forcefullname;
use backend\modules\borrow\models\Wh21full;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use backend\modules\borrow\models\Wh24;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\borrow\models\Borrowreturn */
/* @var $model2 backend\modules\borrow\models\Borrow24 */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://kit.fontawesome.com/3167fafa36.js" crossorigin="anonymous"></script>
<style>
    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
</style>

<div class="borrowreturn-form">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>ยินดีต้อนรับ</h3>
                <p>ระบบทะบียนรับ-ส่ง งานส่งกำลังบำรุง ร้อย ตชด.245 </p>

            </div>
            <div class="col-md-9 register-right">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <h3 class="register-heading">บันทึกทะเบียนรับ</h3>
                <div class="row register-form">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'force_idforce')->dropdownList(
                                ArrayHelper::map(Forcefullname::find()->all(), 'idforce', 'fullname'),
                                ['prompt' => 'ผู้เบิก']
                            ); ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'wh21_idwh21')->dropdownList(
                                ArrayHelper::map(Wh21full::find()->all(), 'idwh21', 'fullname')
                                ,
                                ['prompt' => 'ประเภท ปืนหมายเลข']
                            ); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'items')->label(false)->widget(MultipleInput::className(), [
                                'allowEmptyList' => true,
                                'min' => 1,//อย่างน้อยมี 1 รายการ
                                'max' => 4,//มากสุด 4 รายการ
                                'id' => Html::getInputId($model, 'items'),
                                'columns' => [
                                    [
                                        'name' => 'borrowreturn_idbr',
                                        'title' => 'ID',
                                        'enableError' => true,
                                        'type' => MultipleInputColumn::TYPE_HIDDEN_INPUT,

                                    ],

                                    [
                                        'name' => 'idwh24',
                                        'title' => 'ส่วนควบ',
                                        'type' => MultipleInputColumn::TYPE_DROPDOWN,
                                        'value' => function ($data) {
                                            return $data['idwh24'];
                                        },
                                        'items' => ArrayHelper::map(Wh24::find()->all(), 'idwh24', function ($model) {
                                            return $model->code . '-' . $model->name;
                                        }),
                                        'enableError' => true,
                                        'options' => [
                                            'class' => 'new_class',
                                            'prompt' => 'รายการเบิกส่วนควบ.',
                                            'onchange' => '$(this).init_change();' //ส่งค่าไปเรียก Ajax
                                        ]
                                    ],

                                    [
                                        'name' => 'quantity',
                                        'type' => MultipleInputColumn::TYPE_TEXT_INPUT,
                                        'title' => 'จำนวน',
                                        'value' => function ($data) {
                                            return $data['quantity'];
                                        },
                                        'enableError' => true,

                                    ],
                                ]
                            ]) ?>
                            <div class="form-group">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group align-content-md-center">
                            <?= $form->field($model, 'borrowdate')->widget(DatePicker::className(), [
                                'dateFormat' => 'yyyy-MM-dd',
                                'language' => 'th',
                                'inline' => true,
                            ])
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group align-content-md-center">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

