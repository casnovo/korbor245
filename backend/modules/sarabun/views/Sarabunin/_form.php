<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\sarabun\models\Entryagency;
use backend\modules\sarabun\models\Bloc;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\modules\sarabun\models\sarabunin */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .register{
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }
    .register-left{
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }
    .register-left input{
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
    .register-right{
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }
    .register-left img{
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite  alternate;
        animation: mover 1s infinite  alternate;
    }
    @-webkit-keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    @keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    .register-left p{
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }
    .register .register-form{
        padding: 10%;
        margin-top: 10%;
    }
    .btnRegister{
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
    .register .nav-tabs{
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }
    .register .nav-tabs .nav-link{
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }
    .register .nav-tabs .nav-link:hover{
        border: none;
    }
    .register .nav-tabs .nav-link.active{
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }
    .register-heading{
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
</style>
<div class="sarabunin-form">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>ยินดีต้อนรับ</h3>
                <p>ระบบทะบียนรับ-ส่ง งานส่งกำลังบำรุง ร้อย ตชด.245 </p>

            </div>
            <div class="col-md-9 register-right">

                <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

                <h3 class="register-heading">บันทึกทะเบียนรับ</h3>
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'kind')->radioList([
                                1 => 'วิทยุ',
                                2 => 'หนังสือ', ])?>
                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'bdate')->widget(DatePicker::className(),[
                                'dateFormat' => 'yyyy-MM-dd',
                                'language' => 'th',
                                'inline' => true,
                            ])
                            ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'file')->fileInput() ?>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'binid')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'details')->textarea(['rows' => '6']) ?>

                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'bloc_idbloc')->dropdownList([
                                ArrayHelper::map(Bloc::find() -> all(),'idbloc','name')
                            ],
                               /// ['prompt'=>'เลือกแฟ้ม']
                            ); ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'entryagency_identryagency')->dropdownList([
                                ArrayHelper::map(Entryagency::find() -> all(),'identryagency','name')
                            ],
                               /// ['prompt'=>'หน่วยงานผู้รับ']
                            ); ?>
                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>



            </div>
        </div>