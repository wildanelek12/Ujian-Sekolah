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
                    <img src="img/avatars/avatar_guru.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Charles Hall
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{route('guru.change')}}"><i class="align-middle me-1" data-feather="pie-chart"></i> Ubah Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
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
            <li class="sidebar-item @if(request()->routeIs('guru.dashboard')) active @endif">
                <a class="sidebar-link" href="{{route('guru.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- Hasil Ujian --}}
            <li class="sidebar-item @if(request()->routeIs('guru.hasil')) active @endif">
                <a class="sidebar-link" href="{{route('guru.hasil')}}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Hasil Ujian</span>
                </a>
            </li>

            {{-- List End --}}
        </ul>
    </div>
</nav>