<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
               <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ระบบสารบรรณ</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><?= Html::a('ทะเบียนรับ', ['Sarabun/sarabunin'], ['class' => 'dropdown-item']) ?></li>
                <li><?= Html::a('ทะเบียนส่ง', ['Sarabun/sarabunout'], ['class' => 'dropdown-item']) ?></li>
                <li class="dropdown-divider"></li>
                <li><?= Html::a('จัดการแฟ้ม', ['Sarabun/bloc'], ['class' => 'dropdown-item']) ?></li>
                <li><?= Html::a('แฟ้มรับ', ['Sarabun/blocin'], ['class' => 'dropdown-item']) ?></li>
                <li><?= Html::a('แฟ้มส่ง', ['Sarabun/blocout'], ['class' => 'dropdown-item']) ?></li>
                <li class="dropdown-divider"></li>
                <li><?= Html::a('จัดการหน่วยงาน', ['Sarabun/entryagency'], ['class' => 'dropdown-item']) ?></li>
                <li class="dropdown-divider"></li>
                <li><?= Html::a('Sign out', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?></li>
            </ul>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!--        <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>-->
            </ul>
        </nav>
        <!-- /.navbar -->