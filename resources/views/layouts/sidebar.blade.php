<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">KELMAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">KM</a>
        </div>
        <ul class="sidebar-menu">
            @if (Auth::guard('admin')->user()->level == 'admin')
            <li class="menu-header">MENU</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('admin/pengaduan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengaduan.index') }}"><i class="fas fa-envelope"></i><span>Pengaduan</span></a>
            </li>
            <li class="{{ Request::is('admin/kategori') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kategori.index') }}"><i class="fas fa-box"></i><span>Kategori</span></a>
            </li>
            <li class="{{ Request::is('admin/petugas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('petugas.index') }}"><i class="fas fa-user"></i><span>Petugas</span></a>
            </li>
            <li class="{{ Request::is('admin/masyarakat') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('masyarakat.index') }}"><i class="fas fa-users"></i><span>Masyarakat</span></a>
            </li>
            <li class="{{ Request::is('admin/laporan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.index') }}"><i class="fas fa-clipboard-list"></i><span>Laporan</span></a>
            </li>
            
            @elseif(Auth::guard('admin')->user()->level == 'petugas')
            <li class="menu-header">Petugas</li>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('admin/pengaduan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengaduan.index') }}"><i class="fas fa-envelope"></i><span>Pengaduan</span></a>
            </li>
            @endif

        </ul>
    </aside>
</div>