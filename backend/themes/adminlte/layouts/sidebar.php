<?php
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\bootstrap4\Nav;
use rmrevin\yii\fontawesome\FAS;

?>
<aside class="main-sidebar sidebar-dark-navy elevation-4">
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
           ['label' => 'Bpp 245 System', 'icon' => 'cannabis'],
           [
              'label' => 'สารบรรณ รับ-ส่ง',
               'icon' => 'book',
               'badge' => '<span class="right badge badge-info">v.0.1</span>',
               'items' => [
                   ['label' => 'ทะเบียนหนังสือรับ', 'url' => ['Sarabun/sarabunin'], 'icon' => 'pen','iconClassAdded' => 'text-info'],
                   ['label' => 'ทะเบียนหนังสือส่ง', 'url' => ['Sarabun/sarabunout'], 'icon' => 'pen','iconClassAdded' => 'text-info'],
                   ['label' => 'สร้างแฟ้ม', 'url' => ['Sarabun/bloc'], 'icon' => 'pen','iconClassAdded' => 'text-info'],
                   ['label' => 'แฟ้มรับ', 'url' => ['Sarabun/blocin'], 'icon' => 'pen','iconClassAdded' => 'text-info'],
                   ['label' => 'แฟ้มส่ง', 'url' => ['Sarabun/blocout'], 'icon' => 'pen','iconClassAdded' => 'text-info'],
                   ['label' => 'จัดการหน่วยงาน', 'url' => ['Sarabun/entryagency'], 'icon' => 'pen','iconClassAdded' => 'text-info'],
               ]
           ],
           [
               'label' => 'ข้อมูลยาพาหนะ',
               'icon' => 'car',
               'badge' => '<span class="right badge badge-info">New v.0.1</span>',
               'items' => [

                   ['label' => 'จัดการยานพาหะนะ', 'url' => ['vehicle/vehicle'], 'icon' => 'motorcycle','iconClassAdded' => 'text-info'],
                   ['label' => 'จัดการเอกสาร', 'url' => ['vehicle/vdoc'], 'icon' => 'motorcycle','iconClassAdded' => 'text-info'],

               ]
           ],
           [
               'label' => 'ข้อมูลที่ดิน',
               'icon' => 'city',
               'badge' => '<span class="right badge badge-info">developing</span>',
               'items' => [
                   ['label' => 'ข้อมูลที่ดิน', 'url' => ['land/land'], 'icon' => 'layer-group','iconClassAdded' => 'text-info'],
                   ['label' => 'ข้อมูลอาคาร', 'url' => ['land/building'], 'icon' => 'landmark','iconClassAdded' => 'text-info'],
                   ['label' => 'เอกสารที่ดิน', 'url' => ['land/ldoc'], 'icon' => 'file-pdf','iconClassAdded' => 'text-info'],
                   ['label' => 'เอกสารอาคาร', 'url' => ['land/bdoc'], 'icon' => 'file-pdf','iconClassAdded' => 'text-info'],

               ]
           ],
           [
               'label' => 'ยุทธภันฑ์และพัสดุ',
               'icon' => 'bolt',
               'badge' => '<span class="right badge badge-info">developing</span>',
               'items' => [
                   ['label' => 'บันทึก ยืม-คืน', 'url' => ['borrow/borrowreturn'], 'icon' => 'layer-group','iconClassAdded' => 'text-info'],
                   ['label' => 'ข้อมูลกำลังพล', 'url' => ['borrow/force'], 'icon' => 'landmark','iconClassAdded' => 'text-info'],
                   ['label' => 'ข้อมูลยุทธภัณฑ์', 'url' => ['borrow/wh21'], 'icon' => 'file-pdf','iconClassAdded' => 'text-info'],

               ]
           ],
        //  ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
        //   ['label' => 'Yii2 PROVIDED', 'header' => true],
        //  ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
        //   ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
        //   ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
        //   ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
       ]
  ]);






            ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>