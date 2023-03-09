<nav class="sidebar" id="sidebar">
    <div class="logo-sidebar mb-3">
        <a href="<?= site_url('dashboard') ?>" class="sidebar-brand text-white">
            <span>Layanan Surat Desa</span>
        </a>
    </div>
    <div class="content-menu-sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-header">Menu Utama</li>
            <li class="sidebar-item">
                <a href="<?= site_url('dashboard') ?>" class="sidebar-link">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= site_url('surat') ?>" class="sidebar-link">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span class="align-middle">Daftar Surat</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?= site_url('syarat_surat') ?>" class="sidebar-link">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span class="align-middle">Daftar Persyaratan</span>
                </a>
            </li>
        </ul>

    </div>
</nav>