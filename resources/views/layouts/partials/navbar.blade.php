{{-- Navbar K-amu SKL --}}
<nav class="glass sticky top-0 z-50 border-b border-white/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            {{-- Logo --}}
            <a href="{{ route('landing') }}" class="flex items-center space-x-2">
                <div class="w-8 h-8 rounded-lg gradient-bg flex items-center justify-center">
                    <span class="text-white font-bold text-sm">SK</span>
                </div>
                <span class="font-bold text-lg text-gray-800">K-amu <span class="gradient-text">SKL</span></span>
            </a>

            {{-- Navigation Links --}}
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('landing') }}" class="text-gray-600 hover:text-purple-600 transition font-medium text-sm">Beranda</a>
                <a href="{{ route('explore') }}" class="text-gray-600 hover:text-purple-600 transition font-medium text-sm">Jelajahi</a>
                <a href="{{ route('categories') }}" class="text-gray-600 hover:text-purple-600 transition font-medium text-sm">Kategori</a>

                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-purple-600 transition font-medium text-sm">Dasbor</a>

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-purple-600 transition font-medium text-sm">Admin</a>
                    @endif

                    <div class="flex items-center space-x-3">
                        <a href="{{ route('bookmarks') }}" class="text-gray-500 hover:text-purple-600 transition">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </a>

                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                @if(auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="w-8 h-8 rounded-full">
                                @else
                                    <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </button>

                            <div x-show="open" @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 z-50 border border-gray-100"
                                 x-transition>
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="font-semibold text-sm text-gray-800 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-600">Profil</a>
                                <a href="{{ route('submit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-600">Kirim Tautan</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-600 transition font-medium text-sm">Masuk</a>
                    <a href="{{ route('register') }}" class="gradient-bg text-white px-5 py-2 rounded-full text-sm font-semibold hover:opacity-90 transition glow-hover">
                        Daftar Gratis
                    </a>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-purple-600">
                    <i data-feather="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-white/20 pb-4">
        <div class="px-4 pt-2 space-y-2">
            <a href="{{ route('landing') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Beranda</a>
            <a href="{{ route('explore') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Jelajahi</a>
            <a href="{{ route('categories') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Kategori</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Dasbor</a>
                <a href="{{ route('bookmarks') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Tersimpan</a>
                <a href="{{ route('profile') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Profil</a>
                <a href="{{ route('submit') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Kirim Tautan</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="pt-1">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 text-red-600 hover:text-red-700 text-sm">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-2 text-gray-600 hover:text-purple-600 text-sm">Masuk</a>
                <a href="{{ route('register') }}" class="block py-2 text-purple-600 font-semibold text-sm">Daftar Gratis</a>
            @endauth
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
</script>
@endpush
