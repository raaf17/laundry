<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= site_url('dashboard') ?>">Laundry</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= site_url('dashboard') ?>">LD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="<?= $title === 'Dashboard' ? 'active' : '' ?>">
                <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item dropdown <?= $title === 'Data Jenis Laundry' || $title === 'Data Pelanggan' || $title === 'Data User' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown <?= $title === 'Data Jenis Laundry' || $title === 'Data Pelanggan' || $title === 'Data User' ? 'active' : ''; ?>" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $title === 'Data Jenis Laundry' ? 'active' : '' ?>"><a class="nav-link" href="/jenis">Data Jenis</a></li>
                    <li class="<?= $title === 'Data Pelanggan' ? 'active' : '' ?>"><a class="nav-link" href="/pelanggan">Data Pelanggan</a></li>
                    <li class="<?= $title === 'Data User' ? 'active' : '' ?>"><a class="nav-link" href="/users">Data User</a></li>
                </ul>
            </li>
            <li class="<?= $title === 'Laundry' ? 'active' : '' ?>"><a class="nav-link" href="/laundry"><i class="fas fa-shuffle"></i> <span>Laundry</span></a></li>
            <li class="<?= $title === 'Pengeluaran' ? 'active' : '' ?>"><a class="nav-link" href="/pengeluaran"><i class="fas fa-money-bill-transfer"></i> <span>Pengeluaran</span></a></li>
            <li class="<?= $title === 'Laporan' ? 'active' : '' ?>"><a class="nav-link" href="/laporan"><i class="fas fa-newspaper"></i> <span>Laporan</span></a></li>
            <li class="menu-header">Ekstra</li>
            <li class=""><a class="nav-link" href="/settings"><i class="fas fa-gear"></i> <span>Settings</span></a></li>
            <li><a class="nav-link text-danger" href="/auth/logout"><i class="fas fa-right-from-bracket"></i> <span>Logout</span></a></li>
        </ul>
    </aside>
</div>