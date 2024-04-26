<div class="main-sidebar sidebar-style-3">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Repair Minder</a>
        </div>                
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}"><img src="{{ asset('img/logo_remi.png') }}" width="30" height="30"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ request()->is('user', 'peralatan', 'kategori_peralatan', 'point_check') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('user') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('user') }}">User</a>
                    </li>
                    <li class="{{ request()->is('kategori_peralatan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('kategori_peralatan') }}">Kategori Alat</a>
                    </li>
                    <li class="{{ request()->is('peralatan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('peralatan') }}">Peralatan</a>
                    </li>
                    <li class="{{ request()->is('point_check') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('point_check') }}">Point Check</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->is('penjadwalan', 'perbaikan') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('penjadwalan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('penjadwalan') }}">Penjadwalan</a>
                    </li>
                    <li class="{{ request()->is('perbaikan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('perbaikan') }}">Perbaikan</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->is('laporan_penjadwalan', 'laporan_perbaikan') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('laporan_penjadwalan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('laporan_penjadwalan') }}">Laporan Penjadwalan</a>
                    </li>
                    <li class="{{ request()->is('laporan_perbaikan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('laporan_perbaikan') }}">Laporan Perbaikan</a>
                    </li>
                </ul>
            </li>
        </ul>
        
    </aside>
</div>