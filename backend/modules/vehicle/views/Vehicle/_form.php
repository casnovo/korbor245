<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model backend\modules\vehicle\models\vehicle */
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
<div class="vehicle-form">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="<?= $model->getLogo().'logo.png' ?>" alt=""/>
                <h3>ยินดีต้อนรับ</h3>
                <p>ระบบบันทึกข้อมูลยานพาหะนะ </p>

            </div>
            <div class="col-md-9 register-right">

                <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

                <h3 class="register-heading">บันทึกข้อมูลยานพาหะนะ</h3>
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'enginenumber')->textInput(['maxlength' => true]) ?>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'bodynumber')->textInput(['maxlength' => true]) ?>
                        </div>


                            <div class="form-group">
                                <?= $form->field($model, 'kind')->radioList([
                                    'รถยนต์' => 'รถยนต์',
                                    'จักรยานยนต์' => 'จักรยานยนต์', ])?>
                            </div>

                        <div class="form-group">
                            <?= $form->field($model, 'carregistration')->textInput(['maxlength' => true]) ?>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'status2')->radioList([
                                0 => 'สามารถใช้การได้',
                                1 => 'ไม่สามารถใช้การได้', ])?>
                        </div>
                        <div class="form-group">

                            <?= $form->field($model, 'status')->dropdownList([

                                'ประจำกองร้อย' => 'ประจำกองร้อย',
                                'เบิกจ่ายฐานปฏิบัติการผาตั้ง' => 'เบิกจ่ายฐานปฏิบัติการผาตั้ง',
                                'เบิกจ่ายฐานปฏิบัติการไก่แก้ว' => 'เบิกจ่ายฐานปฏิบัติการไก่แก้ว',
                                'เบิกจ่ายฐานปฏิบัติการวัดอรัญบรรพต' => 'เบิกจ่ายฐานปฏิบัติการวัดอรัญบรรพต',
                                'เบิกจ่ายฐานปฏิบัติการสวยเสด็จ' => 'เบิกจ่ายฐานปฏิบัติการสวยเสด็จ',
                                'เบิกจ่ายประจำตัวบุคคล' => 'เบิกจ่ายประจำตัวบุคคล',
                                ],
                            ); ?>
                        </div>




                                <div class="well text-center">
                                    <?= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
                                </div>
                            <div class="form-group">

                                <?= $form->field($model, 'vimg')->fileInput() ?>
                            </div>
                        <div class="well">
                            <?= $model->getPhotosViewer(); ?>
                        </div>
                        <?= $form->field($model, 'vimgs[]')->fileInput(['multiple' => true]) ?>




                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'detill')->textarea(['rows' => '9']) ?>

                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>


                        <?php ActiveForm::end(); ?>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
