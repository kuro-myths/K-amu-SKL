@php
    $isAuth = auth()->check();
    $isAdmin = $isAuth && auth()->user()->isAdmin();
@endphp

<nav class="mobile-bottom-nav md:hidden" aria-label="Menu cepat mobile">
    <div class="mobile-bottom-nav__inner">
        <a href="{{ route('landing') }}" class="mobile-bottom-nav__item {{ request()->routeIs('landing') ? 'is-active' : '' }}">
            <i data-feather="home" class="w-4 h-4"></i>
            <span>Beranda</span>
        </a>

        <a href="{{ route('explore') }}" class="mobile-bottom-nav__item {{ request()->routeIs('explore') || request()->routeIs('education.show') || request()->routeIs('categories') ? 'is-active' : '' }}">
            <i data-feather="compass" class="w-4 h-4"></i>
            <span>Jelajah</span>
        </a>

        <a href="{{ $isAuth ? route('submit') : route('register') }}" class="mobile-bottom-nav__cta">
            <span class="icon-wrap">
                <i data-feather="{{ $isAuth ? 'plus' : 'user-plus' }}" class="w-4 h-4"></i>
            </span>
            <span>{{ $isAuth ? 'Submit' : 'Daftar' }}</span>
        </a>

        @if($isAuth)
            <a href="{{ route('bookmarks') }}" class="mobile-bottom-nav__item {{ request()->routeIs('bookmarks') ? 'is-active' : '' }}">
                <i data-feather="bookmark" class="w-4 h-4"></i>
                <span>Simpan</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="mobile-bottom-nav__item {{ request()->routeIs('login') ? 'is-active' : '' }}">
                <i data-feather="log-in" class="w-4 h-4"></i>
                <span>Masuk</span>
            </a>
        @endif

        @if($isAdmin)
            <a href="{{ route('admin.dashboard') }}" class="mobile-bottom-nav__item {{ request()->routeIs('admin.*') ? 'is-active' : '' }}">
                <i data-feather="shield" class="w-4 h-4"></i>
                <span>Admin</span>
            </a>
        @elseif($isAuth)
            <a href="{{ route('profile') }}" class="mobile-bottom-nav__item {{ request()->routeIs('profile') || request()->routeIs('profile.update') ? 'is-active' : '' }}">
                <i data-feather="user" class="w-4 h-4"></i>
                <span>Profil</span>
            </a>
        @else
            <a href="{{ route('categories') }}" class="mobile-bottom-nav__item {{ request()->routeIs('categories') ? 'is-active' : '' }}">
                <i data-feather="grid" class="w-4 h-4"></i>
                <span>Kategori</span>
            </a>
        @endif
    </div>
</nav>
