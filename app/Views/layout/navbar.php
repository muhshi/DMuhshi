<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="">D'Muhshi</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <li class="app-search">


            <a class="app-sidebar__user-name" style="color: lightcyan;"></a>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <img class="app-sidebar__user-name" src="<?= base_url('Public/asset/img/' . user()->user_image); ?>" width="20px" alt="User Image">
                <?= user()->username; ?></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="<?= base_url('user'); ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="<?= base_url('logout'); ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= base_url('Public/asset/img/bps.png'); ?>" width="40px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">Badan Pusat Statistik</p>
            <p class="app-sidebar__user-designation">Kabupaten Demak</p>
        </div>
    </div>
    <ul class="app-menu">
        <?php if (in_groups('admin')) : ?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Rekap</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url('admin/rekap'); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Izin</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url('admin/laporan'); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Laporan Kinerja</span></a></li>
                </ul>
            </li>
        <?php endif; ?>
        <li><a class="app-menu__item" href="<?= base_url('izin'); ?>"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Izin</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url('izin/rekap'); ?>"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Izin Saya</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url('laporan'); ?>"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Laporan Kinerja Harian</span></a></li>
        <?php if (in_groups('admin')) : ?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url('admin'); ?>"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Manage User</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url('admin/atasan'); ?>"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Atasan</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url('admin/setting'); ?>"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Setting</span></a></li>
                </ul>
            </li>
        <?php endif; ?>


    </ul>
</aside>