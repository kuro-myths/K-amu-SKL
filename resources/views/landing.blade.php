@extends('layouts.app')

@section('title', 'Sumber Kompetensi Literasi')

@section('content')

{{-- ========== SECTION 1: HERO ========== --}}
<section class="relative overflow-hidden">
    <div class="absolute inset-0 gradient-bg opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-36">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-purple-50 text-purple-600 text-sm font-medium mb-6">
                <i data-feather="zap" class="w-4 h-4 mr-2"></i>
                Sumber Kompetensi Literasi — 100% Gratis
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-gray-900 leading-tight mb-6">
                Temukan Pendidikan<br>
                <span class="gradient-text">Gratis Tanpa Batas</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Platform terkurasi untuk kumpulan link edukasi, tools, dan resource gratis.
                Bangun kompetensimu melalui literasi digital.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('explore') }}" class="gradient-bg text-white px-8 py-4 rounded-full text-lg font-semibold hover:opacity-90 transition glow-hover inline-flex items-center justify-center">
                    <i data-feather="compass" class="w-5 h-5 mr-2"></i>
                    Jelajahi Sekarang
                </a>
                <a href="{{ route('register') }}" class="bg-white text-gray-800 border-2 border-gray-200 px-8 py-4 rounded-full text-lg font-semibold hover:border-purple-300 hover:text-purple-600 transition inline-flex items-center justify-center">
                    <i data-feather="user-plus" class="w-5 h-5 mr-2"></i>
                    Daftar Gratis
                </a>
            </div>
            {{-- Stats --}}
            <div class="flex justify-center gap-8 mt-14">
                <div class="text-center">
                    <p class="text-3xl font-bold gradient-text">{{ $totalEducations }}+</p>
                    <p class="text-gray-500 text-sm">Link Edukasi</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold gradient-text">{{ $totalCategories }}</p>
                    <p class="text-gray-500 text-sm">Kategori</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold gradient-text">{{ $totalUsers }}+</p>
                    <p class="text-gray-500 text-sm">Pengguna</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== SECTION 2: TENTANG ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tentang <span class="gradient-text">K-amu SKL</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Sumber Kompetensi Literasi — Membangun Kompetensi Melalui Literasi Digital</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-2xl bg-purple-50/50 card-hover transition-all duration-300">
                <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4">
                    <i data-feather="target" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Apa Itu K-amu SKL?</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Platform pusat kumpulan link edukasi gratis yang terkurasi. Semua resource tersusun rapi berdasarkan kategori dan level.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-teal-50/50 card-hover transition-all duration-300">
                <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4">
                    <i data-feather="heart" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Kenapa Dibuat?</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Karena akses edukasi berkualitas seharusnya gratis dan mudah dijangkau oleh semua orang, di mana saja.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-purple-50/50 card-hover transition-all duration-300">
                <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4">
                    <i data-feather="globe" class="w-7 h-7 text-white"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Misi & Visi</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Meningkatkan literasi digital dan membangun kompetensi melalui kolaborasi komunitas open-source.</p>
            </div>
        </div>
    </div>
</section>

{{-- ========== SECTION 3: KATEGORI UTAMA ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kategori <span class="gradient-text">Utama</span></h2>
            <p class="text-gray-600">Temukan resource berdasarkan bidang yang kamu minati</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @foreach($categories as $category)
                <a href="{{ route('explore', ['category' => $category->slug]) }}"
                   class="glass p-5 rounded-2xl text-center card-hover transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl gradient-bg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                        <i data-feather="{{ $category->icon ?? 'folder' }}" class="w-6 h-6 text-white"></i>
                    </div>
                    <h3 class="font-semibold text-sm text-gray-800">{{ $category->name }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $category->approved_educations_count }} link</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 4: MATERI GRATIS POPULER ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Materi <span class="gradient-text">Gratis Populer</span></h2>
            <p class="text-gray-600">Website kursus gratis, ebook, dokumentasi, dan PDF terbaik</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($popularEducations as $edu)
                <div class="bg-white border border-gray-100 rounded-2xl p-5 card-hover transition-all duration-300">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 rounded-lg bg-purple-50 text-purple-600 text-xs font-medium">{{ $edu->category->name }}</span>
                        <span class="px-2 py-1 rounded-lg bg-teal-50 text-teal-600 text-xs font-medium">{{ ucfirst($edu->level) }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2 line-clamp-2">{{ $edu->title }}</h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $edu->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400 flex items-center">
                            <i data-feather="eye" class="w-3 h-3 mr-1"></i>
                            {{ number_format($edu->views) }}
                        </span>
                        <a href="{{ route('education.show', $edu) }}" class="text-purple-600 text-sm font-semibold hover:text-purple-700 transition flex items-center">
                            Kunjungi <i data-feather="arrow-right" class="w-4 h-4 ml-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('explore') }}" class="gradient-bg text-white px-6 py-3 rounded-full font-semibold hover:opacity-90 transition inline-flex items-center">
                Lihat Semua <i data-feather="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- ========== SECTION 5: TOOLS GRATIS ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tools <span class="gradient-text">Gratis</span></h2>
            <p class="text-gray-600">Tools premium yang bisa kamu dapatkan secara gratis</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @php
                $tools = [
                    ['name' => 'Figma', 'icon' => 'figma', 'desc' => 'Design Tool'],
                    ['name' => 'GitHub Student Pack', 'icon' => 'github', 'desc' => 'Dev Bundle'],
                    ['name' => 'VS Code', 'icon' => 'code', 'desc' => 'Code Editor'],
                    ['name' => 'Canva', 'icon' => 'image', 'desc' => 'Graphic Design'],
                    ['name' => 'Free API', 'icon' => 'server', 'desc' => 'API Resources'],
                    ['name' => 'Free Hosting', 'icon' => 'cloud', 'desc' => 'Cloud Hosting'],
                ];
            @endphp
            @foreach($tools as $tool)
                <div class="bg-white rounded-2xl p-5 text-center card-hover transition-all duration-300 border border-gray-100">
                    <div class="w-12 h-12 rounded-xl gradient-bg flex items-center justify-center mx-auto mb-3">
                        <i data-feather="{{ $tool['icon'] }}" class="w-6 h-6 text-white"></i>
                    </div>
                    <h3 class="font-semibold text-sm text-gray-800">{{ $tool['name'] }}</h3>
                    <p class="text-xs text-gray-500">{{ $tool['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 6: CARA MENDAPATKAN TOOLS ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Mendapatkan <span class="gradient-text">Tools Gratis</span></h2>
            <p class="text-gray-600">Step-by-step panduan untuk mendapatkan akses tools premium secara gratis</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
                $guides = [
                    ['title' => 'GitHub Student Developer Pack', 'desc' => 'Dapatkan 100+ tools developer gratis dengan email kampus', 'icon' => 'github'],
                    ['title' => 'Google Cloud Free Tier', 'desc' => 'Akses $300 kredit Google Cloud dan layanan gratis selamanya', 'icon' => 'cloud'],
                    ['title' => 'Canva Education', 'desc' => 'Canva Pro gratis untuk pelajar dan pengajar', 'icon' => 'image'],
                    ['title' => 'Free Hosting', 'desc' => 'Deploy project gratis di Vercel, Netlify, Railway', 'icon' => 'globe'],
                ];
            @endphp
            @foreach($guides as $guide)
                <div class="flex items-start gap-4 p-6 rounded-2xl bg-gray-50 card-hover transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl gradient-bg flex-shrink-0 flex items-center justify-center">
                        <i data-feather="{{ $guide['icon'] }}" class="w-6 h-6 text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">{{ $guide['title'] }}</h3>
                        <p class="text-gray-600 text-sm">{{ $guide['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 7: CARA KERJA ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Kerja <span class="gradient-text">Platform</span></h2>
            <p class="text-gray-600">Begitu mudah untuk mulai berbagi dan belajar</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
            @php
                $steps = [
                    ['step' => '1', 'title' => 'Daftar', 'desc' => 'Buat akun gratis', 'icon' => 'user-plus'],
                    ['step' => '2', 'title' => 'Login', 'desc' => 'Masuk ke dashboard', 'icon' => 'log-in'],
                    ['step' => '3', 'title' => 'Submit Link', 'desc' => 'Tambahkan link edukasi', 'icon' => 'plus-circle'],
                    ['step' => '4', 'title' => 'Admin Review', 'desc' => 'Link direview admin', 'icon' => 'check-circle'],
                    ['step' => '5', 'title' => 'Go Live!', 'desc' => 'Digunakan semua orang', 'icon' => 'globe'],
                ];
            @endphp
            @foreach($steps as $step)
                <div class="text-center">
                    <div class="w-16 h-16 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4 relative">
                        <i data-feather="{{ $step['icon'] }}" class="w-7 h-7 text-white"></i>
                        <span class="absolute -top-2 -right-2 w-7 h-7 bg-white rounded-full flex items-center justify-center text-xs font-bold text-purple-600 shadow-md">{{ $step['step'] }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">{{ $step['title'] }}</h3>
                    <p class="text-gray-500 text-sm">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 8: LOKASI LAYANAN ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Layanan <span class="gradient-text">Global</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-2xl bg-purple-50/50">
                <i data-feather="globe" class="w-10 h-10 text-purple-400 mx-auto mb-4"></i>
                <h3 class="font-bold text-gray-900 mb-2">Online Global</h3>
                <p class="text-gray-600 text-sm">Diakses dari mana saja, kapan saja. Tanpa batasan geografis.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-teal-50/50">
                <i data-feather="flag" class="w-10 h-10 text-teal-400 mx-auto mb-4"></i>
                <h3 class="font-bold text-gray-900 mb-2">Indonesia Friendly</h3>
                <p class="text-gray-600 text-sm">Antarmuka Bahasa Indonesia, konten lokal dan internasional.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-purple-50/50">
                <i data-feather="message-circle" class="w-10 h-10 text-purple-400 mx-auto mb-4"></i>
                <h3 class="font-bold text-gray-900 mb-2">Multi Bahasa</h3>
                <p class="text-gray-600 text-sm">Resource dalam berbagai bahasa untuk jangkauan yang lebih luas.</p>
            </div>
        </div>
    </div>
</section>

{{-- ========== SECTION 9: TESTIMONI ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Apa Kata <span class="gradient-text">Mereka?</span></h2>
            <p class="text-gray-600">Feedback dari pengguna K-amu SKL</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $testimonials = [
                    ['name' => 'Ahmad R.', 'role' => 'Mahasiswa IT', 'text' => 'K-amu SKL sangat membantu saya menemukan resource belajar programming gratis yang terkurasi rapi. Tidak perlu lagi bingung cari-cari di Google!', 'rating' => 5],
                    ['name' => 'Siti N.', 'role' => 'Desainer UI/UX', 'text' => 'Koleksi tools gratis di sini lengkap banget. Saya bisa menemukan alternatif tools premium yang gratis untuk pekerjaan desain saya.', 'rating' => 5],
                    ['name' => 'Budi S.', 'role' => 'Fresh Graduate', 'text' => 'Platform ini membantu saya mempersiapkan skill untuk karir. Banyak resource gratis berkualitas yang tidak saya temukan di tempat lain.', 'rating' => 4],
                ];
            @endphp
            @foreach($testimonials as $testi)
                <div class="bg-white p-6 rounded-2xl border border-gray-100 card-hover transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < $testi['rating']; $i++)
                            <i data-feather="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                        @endfor
                    </div>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">"{{ $testi['text'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center">
                            <span class="text-white text-sm font-bold">{{ substr($testi['name'], 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">{{ $testi['name'] }}</p>
                            <p class="text-xs text-gray-500">{{ $testi['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 10: CTA ========== --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="gradient-bg rounded-3xl p-12 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10 rounded-3xl"></div>
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Mulai Belajar?</h2>
                <p class="text-white/80 max-w-lg mx-auto mb-8">
                    Bergabung dengan komunitas K-amu SKL dan akses ribuan link edukasi gratis. Gratis selamanya.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-purple-600 px-8 py-4 rounded-full font-bold hover:bg-gray-50 transition inline-flex items-center justify-center">
                        <i data-feather="user-plus" class="w-5 h-5 mr-2"></i>
                        Daftar Gratis Sekarang
                    </a>
                    <a href="{{ route('explore') }}" class="border-2 border-white/50 text-white px-8 py-4 rounded-full font-bold hover:bg-white/10 transition inline-flex items-center justify-center">
                        <i data-feather="compass" class="w-5 h-5 mr-2"></i>
                        Jelajahi Dulu
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
