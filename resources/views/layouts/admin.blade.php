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
    <div class="admin-app" id="admin-app">

        <!-- Sidebar (Bootstrap offcanvas per il comportamento mobile, stile completamente custom) -->
        <div class="offcanvas-md offcanvas-start admin-sidebar-wrapper" tabindex="-1" id="adminSidebar"
            aria-labelledby="adminSidebarLabel">
            <div class="admin-sidebar">
                <div class="admin-sidebar-header">
                    <a href="{{ route('dashboard') }}" class="sidebar-brand">
                        <span class="brand-mark">{{ Str::substr(config('app.name', 'Laravel'), 0, 1) }}</span>
                        <span class="brand-name" id="adminSidebarLabel">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <button type="button" class="sidebar-close d-md-none" data-bs-dismiss="offcanvas"
                        data-bs-target="#adminSidebar" aria-label="{{ __('Close') }}">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <div class="admin-sidebar-body">
                    <div class="nav-section-title">{{ __('Menu') }}</div>
                    <ul class="admin-nav">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="admin-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="bi bi-speedometer2"></i>
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.projects.index') }}"
                                class="admin-nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                                <i class="bi bi-folder"></i>
                                {{ __('Progetti') }}
                            </a>
                        </li>
                    </ul>

                    <div class="admin-sidebar-footer">
                        <a href="{{ url('/') }}" class="admin-nav-link">
                            <i class="bi bi-box-arrow-left"></i>
                            {{ __('Torna al sito') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="admin-content">

            <!-- Topbar -->
            <nav class="admin-topbar">
                <button class="sidebar-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar"
                    aria-controls="adminSidebar" aria-label="{{ __('Toggle sidebar') }}">
                    <i class="bi bi-list"></i>
                </button>

                <span class="admin-page-title">
                    @yield('page-title', __('Admin'))
                </span>

                <div class="admin-user-menu dropdown">
                    <a href="#" class="admin-user-trigger" id="adminUserDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="avatar-circle">{{ Str::substr(Auth::user()->name, 0, 1) }}</span>
                        <span class="admin-user-name">{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="admin-dropdown-menu dropdown-menu dropdown-menu-end" aria-labelledby="adminUserDropdown">
                        <li><a class="admin-dropdown-item" href="{{ url('profile') }}">
                            <i class="bi bi-person"></i>{{ __('Profile') }}
                        </a></li>
                        <li>
                            <hr class="admin-dropdown-divider">
                        </li>
                        <li>
                            <a class="admin-dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}
                            </a>
                            <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="admin-main">
                @if (session('status'))
                <div class="admin-alert admin-alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
