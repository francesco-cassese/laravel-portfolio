<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('page-title', __('Admin'))</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@400;600;700;800" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="admin-body">
    <div class="d-flex align-items-start" id="admin-app">

        <!-- Sidebar -->
        <div class="offcanvas-md offcanvas-start admin-sidebar text-white" tabindex="-1" id="adminSidebar"
            aria-labelledby="adminSidebarLabel">
            <div class="offcanvas-header">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-brand d-flex align-items-center gap-2 text-white text-decoration-none">
                    <span class="brand-mark text-white">{{ Str::substr(config('app.name', 'Laravel'), 0, 1) }}</span>
                    <span class="fs-6 fw-bold" id="adminSidebarLabel">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <button type="button" class="btn-close btn-close-white d-md-none" data-bs-dismiss="offcanvas"
                    data-bs-target="#adminSidebar" aria-label="{{ __('Close') }}"></button>
            </div>

            <div class="offcanvas-body d-md-flex flex-column p-0 pt-md-3 overflow-y-auto">
                <div class="nav-section-title">{{ __('Menu') }}</div>
                <ul class="nav nav-pills flex-column mb-auto px-2 gap-1">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i>
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                </ul>

                <hr class="text-white-50 mx-3">

                <div class="px-2 pb-3 mt-auto">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="bi bi-box-arrow-left"></i>
                        {{ __('Torna al sito') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="admin-content flex-grow-1 vh-100 overflow-auto">

            <!-- Topbar -->
            <nav class="admin-topbar navbar navbar-light bg-white border-bottom px-3">
                <button class="btn btn-outline-secondary d-md-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#adminSidebar" aria-controls="adminSidebar" aria-label="{{ __('Toggle sidebar') }}">
                    <i class="bi bi-list fs-4"></i>
                </button>

                <span class="navbar-text fs-5 fw-bold text-dark">
                    @yield('page-title', __('Admin'))
                </span>

                <div class="dropdown ms-auto">
                    <a href="#" class="d-flex align-items-center gap-2 text-dark text-decoration-none dropdown-toggle"
                        id="adminUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="avatar-circle">{{ Str::substr(Auth::user()->name, 0, 1) }}</span>
                        <span class="d-none d-sm-inline fw-semibold">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="adminUserDropdown">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">
                            <i class="bi bi-person me-2"></i>{{ __('Profile') }}
                        </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
                            </a>
                            <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="p-4">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
