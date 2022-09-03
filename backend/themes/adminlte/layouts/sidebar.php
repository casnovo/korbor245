<?php
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/.." class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Korbor245</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= 'http://'.\Yii::$app->user->im ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= \Yii::$app->user->name ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'ระบบงานสารบรรณ', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],

                            ['label' => 'ทะเบียนหนังสือรับ', 'url' => ['Sarabun/sarabunin'], 'iconStyle' => 'far'],
                            ['label' => 'ทะเบียนหนังสือส่ง', 'url' => ['Sarabun/sarabunout'], 'iconStyle' => 'far'],
                            ['label' => 'สร้างแฟ้ม', 'url' => ['Sarabun/bloc'], 'iconStyle' => 'far'],
                            ['label' => 'แฟ้มรับ', 'url' => ['Sarabun/blocin'], 'iconStyle' => 'far'],
                            ['label' => 'แฟ้มส่ง', 'url' => ['Sarabun/blocout'], 'iconStyle' => 'far'],
                            ['label' => 'จัดการหน่วยงาน', 'url' => ['Sarabun/entryagency'], 'iconStyle' => 'far'],



                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>