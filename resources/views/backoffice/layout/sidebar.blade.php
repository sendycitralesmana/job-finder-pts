<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/backoffice/dashboard" class="brand-link">
        <img src="{{ asset('images/logo.jpeg') }}"
                alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: .8">
        <span class="brand-text" style="text-transform: uppercase">
            <b>PST</b>
        </span>
        {{-- <div class="d-flex "> --}}
            {{-- <div>
                <img src="{{ asset('images/absen-logo.png') }}" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8; width: 100%">
            </div> --}}
            {{-- <div class="ml-2">
                <span class="brand-text" style="text-transform: uppercase"> <b>Absensi</b> </span>
            </div> --}}
        {{-- </div> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 mb-3 text-center">

            <div class="info">
                <p style="text-transform: uppercase">
                    <b>{{ auth()->user()->role->name }}</b>
                </p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                
                @if (auth()->user()->role_id == 1)
                
                    <li class="nav-item">
                        <a href="/backoffice/dashboard"
                            class="nav-link {{ request()->is('backoffice/dashboard', 'backoffice/dashboard/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/office"
                            class="nav-link {{ request()->is('backoffice/office', 'backoffice/office/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Kantor
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/user"
                            class="nav-link {{ request()->is('backoffice/user', 'backoffice/user/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Pelamar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/vacancy"
                            class="nav-link {{ request()->is('backoffice/vacancy', 'backoffice/vacancy/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-briefcase"></i>
                            <p>
                                Lowongan Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/interview"
                            class="nav-link {{ request()->is('backoffice/interview', 'backoffice/interview/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-chalkboard-teacher"></i>
                            <p>
                                Jadwal Interview
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/training"
                            class="nav-link {{ request()->is('backoffice/training', 'backoffice/training/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-chalkboard-teacher"></i>
                            <p>
                                Jadwal Training
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/qualification"
                            class="nav-link {{ request()->is('backoffice/qualification', 'backoffice/qualification/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-check"></i>
                            <p>
                                Kandidat Lulus
                            </p>
                        </a>
                    </li>

                    {{-- <li class="nav-item has-treeview {{ request()->is('backoffice/user-data/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('backoffice/user-data/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard-user"></i>
                            <p>
                                Data Lowongan Kerja
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/user-data/role"
                                    class="nav-link {{ request()->is('backoffice/user-data/role', 'backoffice/user-data/role/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Lowongan Kerja</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/user-data/user"
                                    class="nav-link {{ request()->is('backoffice/user-data/user', 'backoffice/user-data/user/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Jadwal Interview</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item has-treeview {{ request()->is('backoffice/user-data/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('backoffice/user-data/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard-user"></i>
                            <p>
                                Data Penilaian
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/user-data/role"
                                    class="nav-link {{ request()->is('backoffice/user-data/role', 'backoffice/user-data/role/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Interview</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/user-data/user"
                                    class="nav-link {{ request()->is('backoffice/user-data/user', 'backoffice/user-data/user/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Hasil</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item has-treeview {{ request()->is('backoffice/user-data/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('backoffice/user-data/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard-user"></i>
                            <p>
                                Data Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/user-data/role"
                                    class="nav-link {{ request()->is('backoffice/user-data/role', 'backoffice/user-data/role/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Peran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/user-data/user"
                                    class="nav-link {{ request()->is('backoffice/user-data/user', 'backoffice/user-data/user/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    
                @endif

            </ul>
        </nav>
        
    </div>
    
</aside>
