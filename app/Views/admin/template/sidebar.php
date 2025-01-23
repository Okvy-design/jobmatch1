<div class="navbar-brand header-logo">
    <a href="<?= base_url('/'); ?>" class="b-brand">
        <span class="brand-logo">
            <!-- Logo kecil atau ikon -->
            <img src="<?= base_url('assets/img/logo-small.png'); ?>" alt="Logo" class="logo-small" style="display: none;">
            <!-- Teks besar -->
            <h2 class="text-white fw-bold logo-text">JobMatch</h2>
        </span>
    </a>
    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
</div>

<!-- <div class="navbar-brand header-logo">
    <a href="" class="b-brand">
        <h2 class="text-white fw-bold">JobMatch</h2>
    </a>
    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
</div> -->
<div class="navbar-content scroll-div">
    <ul class="nav pcoded-inner-navbar">
        <li class="nav-item pcoded-menu-caption">
            <label>Dashboard</label>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/dashboard'); ?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
        </li>
    </ul>

    <!-- new -->
    <ul class="nav pcoded-inner-navbar">
    <li class="nav-item pcoded-hasmenu">
        <a href="javascript:void(0)" class="nav-link">
            <span class="pcoded-micon"><i class="feather icon-box"></i></span>
            <span class="pcoded-mtext">Master</span>
        </a>
        <ul class="pcoded-submenu">
            <li><a href="<?= base_url('/admin/freelancer'); ?>"><span class="pcoded-mtext">Data Freelancer</span></a></li>
            <li><a href="<?= base_url('/admin/company'); ?>"><span class="pcoded-mtext">Data Company</span></a></li>
        </ul>
    </li>
</ul>
        <ul class="nav pcoded-inner-navbar">
                <li class="nav-item">
                    <a href="<?= base_url('/admin/transaksi'); ?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-credit-card">
                    </i></span><span class="pcoded-mtext">Transaction</span></a> 
                </li>
            </ul>
            <ul class="nav pcoded-inner-navbar">
            <li class="nav-item pcoded-hasmenu">
                <a href="javascript:void(0)" class="nav-link">
                    <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                    <span class="pcoded-mtext">Laporan</span>
                </a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('/admin/laporan/freelance'); ?>"><span class="pcoded-mtext">Freelance</span></a></li>
                    <li><a href="<?= base_url('/admin/laporan/company'); ?>"><span class="pcoded-mtext">Company</span></a></li>
                    <li><a href="<?= base_url('/admin/laporan/transaksi'); ?>"><span class="pcoded-mtext">Transaksi</span></a></li>
                </ul>
            </li>
        </ul>


   
    </li>
    <!-- Menu lainnya -->
</ul>
</div>