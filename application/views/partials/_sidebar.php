<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <a class="navbar-brand" href="<?php echo site_url('')?>"><img src="<?= base_url('assets/img/logo.jpeg')?>"style="margin-top: -15px">
                <small style="font-size: 12px; float: left">PT. WILMAR NABATI INDONESIA</small>
            </a>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?= base_url('assets/img/dummy/u2.png')?>" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?= $_SESSION['nama']?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <?php if (false){?>
                        <a href="index.html" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                    class="mr-2 icon-security text-purple"></i>Change Password</a>
                        <?php }?>
                        <a href="<?= site_url('/Auth/logout')?>" class="list-group-item list-group-item-action"><i
                                    class="mr-2 icon-exit_to_app text-red"></i>Keluar</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MENU</strong></li>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Home')?>">
                    <i class="icon icon-dashboard2 purple-text s-18"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if ($_SESSION['kode_akses'] == 0){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Users')?>">
                    <i class="icon icon-user red-text s-18"></i>
                    <span>Data Users</span>
                </a>
            </li>
            <?php }?>
            <?php if ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2){?>
                <li class="treeview no-b">
                    <a href="<?php echo site_url('/Satuan')?>">
                        <i class="icon icon-info orange-text s-18"></i>
                        <span>Data Satuan</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2){?>
                <li class="treeview no-b">
                    <a href="<?php echo site_url('/Jenis')?>">
                        <i class="icon icon-document-checked yellow-text s-18"></i>
                        <span>Data Jenis</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2){?>
                <li class="treeview no-b">
                    <a href="<?php echo site_url('/Produk')?>">
                        <i class="icon icon-box green-text s-18"></i>
                        <span>Data Produk</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 3){?>
                <li class="treeview no-b">
                    <a href="<?php echo site_url('/Grafik')?>">
                        <i class="icon icon-line-chart indigo-text s-18"></i>
                        <span>Peta Kendali</span>
                    </a>
                </li>
            <?php }?>
        </ul>
    </section>
</aside>