{{-- Footer K-amu SKL --}}
<footer class="bg-gray-900 text-gray-300 mt-20 pb-24 md:pb-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Brand --}}
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8 rounded-lg gradient-bg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">SK</span>
                    </div>
                    <span class="font-bold text-lg text-white">K-amu SKL</span>
                </div>
                <p class="text-gray-400 text-sm mb-2 font-medium">Sumber Kompetensi Literasi</p>
                <p class="text-gray-500 text-sm leading-relaxed max-w-md">
                    Platform kumpulan link & tools edukasi gratis. Membangun kompetensi melalui literasi digital untuk semua.
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="https://github.com/kuro-myths/K-amu-SKL" target="_blank" class="text-gray-400 hover:text-white transition">
                        <i data-feather="github" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            {{-- Navigasi --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Navigasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('landing') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('explore') }}" class="hover:text-white transition">Jelajahi</a></li>
                    <li><a href="{{ route('categories') }}" class="hover:text-white transition">Kategori</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="hover:text-white transition">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition">Daftar</a></li>
                    @endguest
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h3 class="text-white font-semibold mb-4">Legal & Info</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="https://github.com/kuro-myths/K-amu-SKL/blob/main/LICENSE.md" target="_blank" class="hover:text-white transition">Lisensi</a></li>
                    <li><a href="https://github.com/kuro-myths/K-amu-SKL/blob/main/CONTRIBUTING.md" target="_blank" class="hover:text-white transition">Kontribusi</a></li>
                    <li><a href="https://github.com/kuro-myths/K-amu-SKL/blob/main/SPONSORS.md" target="_blank" class="hover:text-white transition">Sponsor</a></li>
                    <li><a href="https://github.com/kuro-myths/K-amu-SKL/blob/main/SECURITY.md" target="_blank" class="hover:text-white transition">Keamanan</a></li>
                    <li><a href="https://github.com/kuro-myths/K-amu-SKL/blob/main/CODE_OF_CONDUCT.md" target="_blank" class="hover:text-white transition">Kode Etik</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} K-amu SKL — Sumber Kompetensi Literasi. Dibuat dengan ❤️ oleh
                <a href="https://github.com/kuro-myths" target="_blank" class="text-purple-400 hover:text-purple-300">kuro-myths</a>
            </p>
            <p class="text-gray-600 text-xs mt-2 md:mt-0">
                Membangun Kompetensi Melalui Literasi Digital
            </p>
        </div>
    </div>
</footer>
