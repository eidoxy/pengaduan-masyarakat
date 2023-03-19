<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        {{-- @if(Auth::guard('admin')->check())
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
                <i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">
                    Notifications
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-danger text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        @endif --}}

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if(Auth::guard('admin')->check())
                <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('admin')->user()->nama_petugas}}</div>
                @elseif(Auth::guard('masyarakat')->check())
                <img alt="image" src="{{ asset('foto/' . Auth::guard('masyarakat')->user()->foto) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('masyarakat')->user()->nama}}</div>
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                @if(Auth::guard('admin')->check())
                <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                @elseif(Auth::guard('masyarakat')->check())
                <a href="/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                @endif
            </div>
        </li>
    </ul>
</nav>