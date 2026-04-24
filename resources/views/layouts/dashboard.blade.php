<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LinkBio') }} – Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mono antialiased" x-data="{ sidebarOpen: false }">
    <div id="page-dashboard" class="page active">
        <div class="dash-layout">
            <!-- SIDEBAR -->
            <aside class="sidebar" :class="{ 'open': sidebarOpen }">
                <div class="sidebar-logo">
                    <a href="{{ url('/') }}" style="text-decoration:none; color:inherit;">LINK<span>BRUT</span></a>
                </div>
                
                <div class="sidebar-profile">
                    <div class="sidebar-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <div>
                        <div class="sidebar-username">{{ Auth::user()->name }}</div>
                        <div class="sidebar-url">@ {{ Auth::user()->username ?? 'user' }}</div>
                    </div>
                </div>

                <nav class="sidebar-nav">
                    <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span class="nav-icon">📊</span> DASHBOARD
                    </a>
                    <a href="{{ route('admin.links.index') }}" class="nav-item {{ request()->routeIs('admin.links.*') ? 'active' : '' }}">
                        <span class="nav-icon">🔗</span> KELOLA LINKS
                    </a>
                    <a href="{{ route('admin.portfolios.index') }}" class="nav-item {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                        <span class="nav-icon">🖼️</span> PORTFOLIO
                    </a>
                    <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <span class="nav-icon">👤</span> PROFIL
                    </a>
                </nav>

                <div class="sidebar-bottom">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-item" style="color:var(--red); border:none; background:none; cursor:pointer; width:100%; text-align:left;">
                            <span class="nav-icon">🚪</span> KELUAR
                        </button>
                    </form>
                </div>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="dash-main">
                <header class="dash-topbar">
                    <div style="display: flex; align-items: center;">
                        <button class="menu-toggle" @click="sidebarOpen = !sidebarOpen">MENU</button>
                        <h1 class="dash-page-title">@yield('header', $header ?? 'Dashboard')</h1>
                    </div>
                    <div class="dash-topbar-actions">
                         <a href="{{ route('profile.edit') }}" class="btn btn-white" style="padding: 8px 16px; font-size: 11px;">SETTING</a>
                    </div>
                </header>

                <div class="dash-content">
                    @if (isset($slot))
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>
