<div class="navbar-brand header-logo">
    <a href="<?= base_url('/'); ?>" class="b-brand">
        <h2 class="text-white fw-bold">JobMatch</h2>
    </a>
    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
</div>
<div class="navbar-content scroll-div">
    <ul class="nav pcoded-inner-navbar">
        <li class="nav-item pcoded-menu-caption">
            <label>Profile</label>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('company/profile'); ?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">My Profile</span></a>
        </li>
        <li class="nav-item pcoded-menu-caption">
            <label>Job</label>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('company/publish-job'); ?>" class="nav-link">
                <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                <span class="pcoded-mtext">Publish Job</span></a>
        </li>
        <li class="nav-item">
        <a href="<?= base_url('company/payment'); ?>" class="nav-link">
            <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
            <span class="pcoded-mtext">Payment</span>
        </a>
        </li>
    </ul>
</div>