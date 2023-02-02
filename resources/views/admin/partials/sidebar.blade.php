<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="sidebar-brand-text align-middle">
                AdminKit
                <sup><small class="badge bg-primary text-uppercase">Pro</small></sup>
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
                stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Charles Hall
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                            <a class="dropdown-item" href="#"></a>
                        </form>
                    </div>

                    <div class="sidebar-user-subtitle">Designer</div>
                </div>
            </div>
        </div>

        {{-- mengganti sidebar menu --}}

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            {{-- Dashboard --}}
            <li class="sidebar-item @if(request()->routeIs('admin.dashboard')) active @endif">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- Data Guru --}}
            <li class="sidebar-item @if(request()->routeIs('admin.guru')) active @endif">
                <a class="sidebar-link" href="{{route('admin.guru')}}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Guru</span>
                </a>
            </li>
            
            {{-- Data Kelas --}}
            <li class="sidebar-item @if(request()->routeIs('admin.kelas')) active @endif">
                <a class="sidebar-link" href="{{route('admin.kelas')}}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Kelas</span>
                </a>
            </li>

            {{-- Data Siswa --}}
            <li class="sidebar-item @if(request()->routeIs('admin.siswa')) active @endif">
                <a class="sidebar-link" href="{{route('admin.siswa')}}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Siswa</span>
                </a>
            </li>

            {{-- Mata Pelajaran --}}
            <li class="sidebar-item @if(request()->routeIs('mapel.index')) active @endif">
                <a class="sidebar-link" href="{{route('mapel.index')}}">
                    <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Mata Pelajaran</span>
                </a>
            </li>


            {{-- Data Ujian --}}
            <li class="sidebar-item @if(request()->routeIs('admin.ujian')) active @endif">
                <a class="sidebar-link" href="{{route('admin.ujian')}}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Data Ujian</span>
                </a>
            </li>

            {{-- List End --}}
        </ul>
    </div>
</nav>