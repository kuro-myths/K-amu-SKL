@extends('layouts.app')

@section('title', 'Sumber Kompetensi Literasi')

@section('content')

{{-- ========== SECTION 1: HERO ========== --}}
<section class="relative overflow-hidden min-h-[90vh] flex items-center bg-gradient-to-br from-gray-50 via-white to-purple-50/30">
    {{-- Subtle background blobs --}}
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-200/20 rounded-full blur-3xl animate-float-slow pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-teal-200/20 rounded-full blur-3xl animate-float-reverse pointer-events-none"></div>
    <div class="absolute top-1/2 right-1/3 w-44 h-44 bg-white/60 rounded-full blur-3xl animate-float pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Left: Text --}}
            <div class="order-2 lg:order-1 lg:pr-6">
                <div data-aos="fade-right" data-aos-delay="100" class="inline-flex items-center px-4 py-2 rounded-full bg-purple-50 text-purple-600 text-sm font-medium mb-6 border border-purple-100">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    Sumber Kompetensi Literasi — 100% Gratis
                </div>
                <h1 data-aos="fade-right" data-aos-delay="200" class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6 max-w-xl">
                    Temukan Pendidikan
                    <span class="gradient-text block mt-2">Gratis Tanpa Batas</span>
                </h1>
                <p data-aos="fade-right" data-aos-delay="300" class="text-lg text-gray-600 max-w-lg mb-8 leading-relaxed">
                    Platform terkurasi untuk kumpulan link edukasi, tools, dan resource gratis dari seluruh internet.
                    Bangun kompetensimu bersama <strong class="text-gray-800">{{ number_format($totalUsers) }}+</strong> pengguna.
                </p>
                @php
                    $heroHighlights = [
                        ['icon' => 'shield', 'label' => 'Terkurasi admin'],
                        ['icon' => 'star', 'label' => 'Favorit komunitas'],
                        ['icon' => 'bookmark', 'label' => 'Simpan cepat'],
                    ];
                @endphp
                <div data-aos="fade-right" data-aos-delay="350" class="flex flex-wrap gap-3 mb-8">
                    @foreach($heroHighlights as $highlight)
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-100 text-sm text-gray-600 shadow-sm hover:shadow-md transition-all">
                            <i data-feather="{{ $highlight['icon'] }}" class="w-4 h-4 text-purple-500"></i>
                            {{ $highlight['label'] }}
                        </span>
                    @endforeach
                </div>
                <div data-aos="fade-right" data-aos-delay="400" class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="{{ route('explore') }}" class="gradient-bg text-white px-8 py-4 rounded-full text-lg font-semibold hover:opacity-90 transition glow-hover inline-flex items-center justify-center">
                        <i data-feather="compass" class="w-5 h-5 mr-2"></i>
                        Jelajahi Sekarang
                    </a>
                    <a href="{{ route('register') }}" class="bg-white text-gray-800 border-2 border-gray-200 px-8 py-4 rounded-full text-lg font-semibold hover:border-purple-300 hover:text-purple-600 hover:shadow-lg transition-all inline-flex items-center justify-center">
                        <i data-feather="user-plus" class="w-5 h-5 mr-2"></i>
                        Daftar Gratis
                    </a>
                </div>
                {{-- Stats --}}
                <div data-aos="fade-up" data-aos-delay="500" class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl">
                    <div class="glass rounded-2xl p-4 border border-white/60 shadow-sm text-center card-hover">
                        <p class="text-3xl font-bold gradient-text">{{ $totalEducations }}+</p>
                        <p class="text-gray-500 text-sm mt-1">Link Edukasi</p>
                    </div>
                    <div class="glass rounded-2xl p-4 border border-white/60 shadow-sm text-center card-hover">
                        <p class="text-3xl font-bold gradient-text">{{ $totalCategories }}</p>
                        <p class="text-gray-500 text-sm mt-1">Kategori</p>
                    </div>
                    <div class="glass rounded-2xl p-4 border border-white/60 shadow-sm text-center card-hover">
                        <p class="text-3xl font-bold gradient-text">{{ $totalUsers }}+</p>
                        <p class="text-gray-500 text-sm mt-1">Pengguna</p>
                    </div>
                </div>
            </div>

            {{-- Right: Hero Image --}}
            <div data-aos="fade-left" data-aos-delay="300" class="relative order-1 lg:order-2">
                <div class="absolute -inset-8 bg-gradient-to-tr from-purple-200/30 via-transparent to-teal-200/30 blur-3xl pointer-events-none"></div>
                <div class="relative mx-auto max-w-xl">
                    <div class="absolute -top-5 -left-4 hidden sm:block glass rounded-2xl px-4 py-3 shadow-lg animate-float-slow">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center">
                                <i data-feather="award" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-700 uppercase tracking-wide">Kurasi aktif</p>
                                <p class="text-sm text-gray-500">Setiap tautan ditinjau</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-5 right-4 hidden sm:block glass rounded-2xl px-4 py-3 shadow-lg animate-float-reverse">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-yellow-500 flex items-center justify-center">
                                <i data-feather="trending-up" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-700 uppercase tracking-wide">Tumbuh cepat</p>
                                <p class="text-sm text-gray-500">{{ $totalEducations }}+ resource</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-white/80 p-3 shadow-[0_30px_80px_rgba(124,58,237,0.18)] animate-pulse-glow">
                        <div class="img-hover-zoom rounded-[1.5rem] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&auto=format&fit=crop&q=80"
                                 alt="Komunitas belajar bersama"
                                 class="w-full h-[320px] sm:h-[400px] lg:h-[520px] object-cover" loading="eager">
                        </div>
                        <div class="absolute left-6 right-6 bottom-6 grid grid-cols-2 gap-3">
                            <div class="glass rounded-2xl p-3 shadow-lg backdrop-blur-md animate-float-slow">
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="w-8 h-8 rounded-lg gradient-bg flex items-center justify-center">
                                        <i data-feather="book-open" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">Belajar</p>
                                </div>
                                <p class="text-sm font-bold text-gray-800 leading-tight">Ratusan resource siap jelajah</p>
                            </div>
                            <div class="glass rounded-2xl p-3 shadow-lg backdrop-blur-md animate-float-reverse">
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="w-8 h-8 rounded-lg bg-teal-500 flex items-center justify-center">
                                        <i data-feather="users" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">Komunitas</p>
                                </div>
                                <p class="text-sm font-bold text-gray-800 leading-tight">Dibagikan oleh pengguna aktif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== SECTION 2: TENTANG ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Left: Image --}}
            <div data-aos="fade-right" class="max-w-md mx-auto lg:max-w-none">
                <div class="grid grid-cols-2 gap-3">
                    <div class="rounded-xl overflow-hidden shadow-md img-hover-zoom">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=280&h=200&fit=crop"
                             alt="Students" class="w-full h-40 object-cover" loading="lazy">
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-md img-hover-zoom mt-6">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=280&h=200&fit=crop"
                             alt="Collaboration" class="w-full h-40 object-cover" loading="lazy">
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-md img-hover-zoom">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=280&h=200&fit=crop"
                             alt="Online learning" class="w-full h-40 object-cover" loading="lazy">
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-md img-hover-zoom mt-6">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=280&h=200&fit=crop"
                             alt="Education" class="w-full h-40 object-cover" loading="lazy">
                    </div>
                </div>
            </div>

            {{-- Right: Text --}}
            <div>
                <div data-aos="fade-left" data-aos-delay="100">
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold mb-4 uppercase tracking-wide">Tentang Kami</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Apa itu <span class="gradient-text">K-amu SKL?</span>
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        <strong class="text-gray-800">K-amu SKL</strong> (Sumber Kompetensi Literasi) adalah platform open-source yang mengumpulkan, mengelola, dan berbagi link edukasi gratis dari seluruh internet. Akses pendidikan berkualitas seharusnya <strong class="text-gray-800">gratis dan mudah dijangkau</strong> oleh semua orang.
                    </p>
                </div>
                <div class="space-y-3">
                    @php
                        $aboutItems = [
                            ['icon' => 'target', 'title' => 'Terkurasi & Terverifikasi', 'desc' => 'Setiap link direview admin sebelum dipublikasi.', 'bg' => 'bg-purple-50/50'],
                            ['icon' => 'users', 'title' => 'Komunitas Kolaboratif', 'desc' => 'Dibangun komunitas, untuk komunitas. Siapa saja bisa kontribusi.', 'bg' => 'bg-teal-50/50'],
                            ['icon' => 'heart', 'title' => 'Gratis Selamanya', 'desc' => 'Tanpa biaya, tanpa langganan. Akses untuk semua.', 'bg' => 'bg-purple-50/50'],
                        ];
                    @endphp
                    @foreach($aboutItems as $idx => $item)
                        <div data-aos="fade-left" data-aos-delay="{{ ($idx + 2) * 100 }}" class="flex items-start gap-3 p-3 rounded-xl {{ $item['bg'] }} hover:shadow-sm transition-all">
                            <div class="w-9 h-9 rounded-lg gradient-bg flex-shrink-0 flex items-center justify-center">
                                <i data-feather="{{ $item['icon'] }}" class="w-4 h-4 text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-sm">{{ $item['title'] }}</h3>
                                <p class="text-gray-600 text-xs">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== SECTION 3: KATEGORI ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold mb-4 uppercase tracking-wide">Kategori</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Jelajahi Berdasarkan <span class="gradient-text">Kategori</span></h2>
            <p class="text-gray-600 max-w-lg mx-auto">Temukan resource berdasarkan bidang yang kamu minati.</p>
        </div>
        @php
            $catIcons = [
                'programming' => 'code',
                'design' => 'pen-tool',
                'business' => 'briefcase',
                'artificial-intelligence' => 'cpu',
                'bahasa' => 'globe',
                'matematika' => 'hash',
                'tools-developer' => 'tool',
                'referensi-akademik' => 'book-open',
                'ui-ux' => 'layout',
                'career' => 'trending-up',
            ];
            $catColors = [
                'programming' => 'bg-blue-50 border-blue-200 hover:bg-blue-100',
                'design' => 'bg-pink-50 border-pink-200 hover:bg-pink-100',
                'business' => 'bg-amber-50 border-amber-200 hover:bg-amber-100',
                'artificial-intelligence' => 'bg-violet-50 border-violet-200 hover:bg-violet-100',
                'bahasa' => 'bg-emerald-50 border-emerald-200 hover:bg-emerald-100',
                'matematika' => 'bg-cyan-50 border-cyan-200 hover:bg-cyan-100',
                'tools-developer' => 'bg-gray-50 border-gray-200 hover:bg-gray-100',
                'referensi-akademik' => 'bg-yellow-50 border-yellow-200 hover:bg-yellow-100',
                'ui-ux' => 'bg-fuchsia-50 border-fuchsia-200 hover:bg-fuchsia-100',
                'career' => 'bg-lime-50 border-lime-200 hover:bg-lime-100',
            ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($categories as $index => $category)
                <a href="{{ route('explore', ['category' => $category->slug]) }}"
                   data-aos="fade-up"
                   data-aos-delay="{{ ($index % 5) * 80 }}"
                   class="group {{ $catColors[$category->slug] ?? 'bg-gray-50 border-gray-200 hover:bg-gray-100' }} border rounded-xl p-4 text-center transition-all duration-300 card-hover">
                    <div class="w-12 h-12 rounded-xl gradient-bg flex items-center justify-center mx-auto mb-3 shadow-sm">
                        <i data-feather="{{ $catIcons[$category->slug] ?? 'folder' }}" class="w-5 h-5 text-white"></i>
                    </div>
                    <h3 class="font-bold text-sm text-gray-800 group-hover:text-purple-600 transition-colors">{{ $category->name }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ $category->approved_educations_count }} link</p>
                </a>
            @endforeach
        </div>
        <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('categories') }}" class="text-purple-600 font-semibold hover:text-purple-700 transition inline-flex items-center text-sm group">
                Lihat Semua Kategori <i data-feather="arrow-right" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

{{-- ========== SECTION 4: MATERI POPULER ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
            <div data-aos="fade-right">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold mb-4 uppercase tracking-wide">Populer</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Materi <span class="gradient-text">Gratis Populer</span></h2>
                <p class="text-gray-600">Kursus, ebook, dokumentasi, dan resource gratis terbaik.</p>
            </div>
            <a href="{{ route('explore') }}" data-aos="fade-left" class="gradient-bg text-white px-5 py-2.5 rounded-full font-semibold text-sm hover:opacity-90 transition inline-flex items-center mt-4 md:mt-0 group">
                Lihat Semua <i data-feather="arrow-right" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        @if($popularEducations->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($popularEducations as $index => $edu)
                <div data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 80 }}"
                     class="group bg-white border border-gray-100 rounded-xl overflow-hidden card-hover transition-all duration-300 hover:border-purple-200">
                    <div class="relative h-40 overflow-hidden">
                        @if($edu->thumbnail)
                            <img src="{{ $edu->thumbnail }}" alt="{{ $edu->title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-teal-100 flex items-center justify-center">
                                <i data-feather="link" class="w-10 h-10 text-purple-300"></i>
                            </div>
                        @endif
                        <div class="absolute top-2 left-2">
                            <span class="px-2 py-0.5 rounded-md bg-white/90 backdrop-blur-sm text-purple-600 text-[11px] font-semibold">{{ $edu->category->name }}</span>
                        </div>
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-0.5 rounded-md bg-white/90 backdrop-blur-sm text-teal-600 text-[11px] font-semibold">{{ ucfirst($edu->level) }}</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-sm text-gray-900 mb-1.5 line-clamp-2 group-hover:text-purple-600 transition-colors">{{ $edu->title }}</h3>
                        <p class="text-gray-500 text-xs mb-3 line-clamp-2">{{ $edu->description }}</p>
                        <div class="flex items-center justify-between pt-2 border-t border-gray-50">
                            <span class="text-[11px] text-gray-400 flex items-center">
                                <i data-feather="eye" class="w-3 h-3 mr-1"></i>{{ number_format($edu->views) }}
                            </span>
                            <a href="{{ route('education.show', $edu) }}" class="text-purple-600 text-xs font-semibold hover:text-purple-700 transition flex items-center">
                                Kunjungi <i data-feather="external-link" class="w-3 h-3 ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 bg-gray-50 rounded-xl" data-aos="fade-up">
            <i data-feather="inbox" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
            <h3 class="text-lg font-bold text-gray-700 mb-2">Belum Ada Materi</h3>
            <p class="text-gray-500 text-sm mb-4">Jadilah yang pertama berbagi link edukasi gratis!</p>
            <a href="{{ route('register') }}" class="gradient-bg text-white px-5 py-2.5 rounded-full font-semibold text-sm hover:opacity-90 transition inline-flex items-center">
                <i data-feather="plus-circle" class="w-4 h-4 mr-2"></i> Mulai Berkontribusi
            </a>
        </div>
        @endif
    </div>
</section>

{{-- ========== SECTION 4B: UNGGULAN ========== --}}
<section class="py-20 bg-gradient-to-b from-amber-50/40 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
            <div data-aos="fade-right">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold mb-4 uppercase tracking-wide">Unggulan</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Pilihan <span class="gradient-text">Unggulan Minggu Ini</span></h2>
                <p class="text-gray-600">Link terkurasi terbaik berdasarkan kualitas konten dan minat pengguna.</p>
            </div>
            <a href="{{ route('explore', ['featured' => 1]) }}" data-aos="fade-left" class="bg-yellow-500 text-white px-5 py-2.5 rounded-full font-semibold text-sm hover:bg-yellow-600 transition inline-flex items-center mt-4 md:mt-0 group">
                Lihat Unggulan <i data-feather="star" class="w-4 h-4 ml-1"></i>
            </a>
        </div>

        @if($featuredEducations->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($featuredEducations as $index => $featured)
                    <div data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}"
                         class="bg-white border border-yellow-100 rounded-2xl overflow-hidden card-hover transition-all duration-300 hover:border-yellow-300">
                        <div class="h-40 overflow-hidden relative">
                            @if($featured->thumbnail)
                                <img src="{{ $featured->thumbnail }}" alt="{{ $featured->title }}" class="w-full h-full object-cover" loading="lazy">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-yellow-100 to-orange-100 flex items-center justify-center">
                                    <i data-feather="star" class="w-10 h-10 text-yellow-500"></i>
                                </div>
                            @endif
                            <div class="absolute top-2 left-2">
                                <span class="px-2 py-0.5 rounded-md bg-yellow-500 text-white text-[11px] font-semibold">Unggulan</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-purple-600 font-semibold">{{ $featured->category->name }}</span>
                                <span class="text-xs text-gray-500 flex items-center"><i data-feather="star" class="w-3 h-3 mr-1"></i>{{ number_format((float) ($featured->reviews_avg_rating ?? 0), 1) }}</span>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 line-clamp-2">{{ $featured->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $featured->description }}</p>
                            <a href="{{ route('education.show', $featured) }}" class="text-yellow-700 text-sm font-semibold hover:text-yellow-800 inline-flex items-center">
                                Buka Materi <i data-feather="arrow-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-10 bg-white rounded-2xl border border-yellow-100">
                <i data-feather="star" class="w-12 h-12 text-yellow-400 mx-auto mb-3"></i>
                <h3 class="text-lg font-bold text-gray-700 mb-2">Belum Ada Materi Unggulan</h3>
                <p class="text-gray-500 text-sm">Admin bisa menandai materi terbaik sebagai unggulan dari panel admin.</p>
            </div>
        @endif
    </div>
</section>

{{-- ========== SECTION 5: TOOLS GRATIS ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-teal-50 text-teal-600 text-xs font-semibold mb-4 uppercase tracking-wide">Alat</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Alat <span class="gradient-text">Premium Gratis</span></h2>
            <p class="text-gray-600 max-w-lg mx-auto">Alat premium yang bisa kamu dapatkan secara gratis.</p>
        </div>
        @php
            $tools = [
                ['name' => 'Figma', 'desc' => 'Desain & Prototipe', 'icon' => 'pen-tool', 'url' => 'https://figma.com'],
                ['name' => 'GitHub Student', 'desc' => '100+ Alat Developer', 'icon' => 'github', 'url' => 'https://education.github.com/pack'],
                ['name' => 'VS Code', 'desc' => 'Editor Kode', 'icon' => 'code', 'url' => 'https://code.visualstudio.com'],
                ['name' => 'Canva', 'desc' => 'Desain Grafis', 'icon' => 'image', 'url' => 'https://canva.com'],
                ['name' => 'Notion', 'desc' => 'Produktivitas', 'icon' => 'clipboard', 'url' => 'https://notion.so'],
                ['name' => 'Vercel', 'desc' => 'Hosting Gratis', 'icon' => 'cloud', 'url' => 'https://vercel.com'],
            ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($tools as $index => $tool)
                <a href="{{ $tool['url'] }}" target="_blank" rel="noopener"
                   data-aos="fade-up" data-aos-delay="{{ $index * 60 }}"
                   class="bg-white rounded-xl p-5 text-center card-hover transition-all duration-300 border border-gray-100 hover:border-purple-200 group">
                    <div class="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center mx-auto mb-3 group-hover:bg-purple-50 transition-colors">
                        <i data-feather="{{ $tool['icon'] }}" class="w-5 h-5 text-gray-700 group-hover:text-purple-600"></i>
                    </div>
                    <h3 class="font-bold text-sm text-gray-800 group-hover:text-purple-600 transition-colors">{{ $tool['name'] }}</h3>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $tool['desc'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 6: PANDUAN TOOLS ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Left: Image --}}
            <div data-aos="fade-right" class="max-w-md mx-auto lg:max-w-none order-2 lg:order-1">
                <div class="rounded-2xl overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500&h=360&fit=crop"
                         alt="Developer tools" class="w-full h-auto object-cover" loading="lazy">
                </div>
            </div>

            {{-- Right: Content --}}
            <div class="order-1 lg:order-2">
                <div data-aos="fade-left">
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-teal-50 text-teal-600 text-xs font-semibold mb-4 uppercase tracking-wide">Panduan</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Mendapatkan <span class="gradient-text">Tools Gratis</span></h2>
                    <p class="text-gray-600 mb-6 text-sm">Panduan mendapatkan akses tools premium secara gratis.</p>
                </div>
                @php
                    $guides = [
                        ['title' => 'GitHub Student Developer Pack', 'desc' => '100+ alat gratis: domain .me, JetBrains, kredit DigitalOcean $200.', 'icon' => 'github', 'tag' => 'Mahasiswa'],
                        ['title' => 'Google Cloud Free Tier', 'desc' => '$300 kredit + 20 layanan gratis selamanya.', 'icon' => 'cloud', 'tag' => 'Semua'],
                        ['title' => 'Canva Education', 'desc' => 'Canva Pro gratis untuk pelajar dan pengajar.', 'icon' => 'award', 'tag' => 'Pelajar'],
                        ['title' => 'Hosting Gratis', 'desc' => 'Deploy gratis di Vercel, Netlify, dan Railway.', 'icon' => 'server', 'tag' => 'Developer'],
                    ];
                @endphp
                <div class="space-y-3">
                    @foreach($guides as $index => $guide)
                        <div data-aos="fade-left" data-aos-delay="{{ ($index + 1) * 80 }}"
                             class="flex items-start gap-3 p-4 rounded-xl border border-gray-100 hover:border-purple-200 hover:shadow-sm transition-all duration-300 group">
                            <div class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center flex-shrink-0">
                                <i data-feather="{{ $guide['icon'] }}" class="w-4 h-4 text-white"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-0.5">
                                    <h3 class="font-bold text-sm text-gray-900 group-hover:text-purple-600 transition-colors">{{ $guide['title'] }}</h3>
                                    <span class="px-1.5 py-0.5 rounded-full bg-teal-50 text-teal-600 text-[10px] font-medium">{{ $guide['tag'] }}</span>
                                </div>
                                <p class="text-gray-600 text-xs">{{ $guide['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ========== SECTION 7: CARA KERJA ========== --}}
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14" data-aos="fade-up">
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold mb-4 uppercase tracking-wide">Alur</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Cara Kerja <span class="gradient-text">Platform</span></h2>
                    <p class="text-gray-600">5 langkah sederhana untuk mulai berbagi dan belajar.</p>
                </div>
                @php
                    $steps = [
                        ['step' => '1', 'title' => 'Daftar', 'desc' => 'Buat akun gratis', 'icon' => 'user-plus'],
                        ['step' => '2', 'title' => 'Masuk', 'desc' => 'Masuk ke dasbor', 'icon' => 'log-in'],
                        ['step' => '3', 'title' => 'Kirim', 'desc' => 'Kirim tautan edukasi', 'icon' => 'send'],
                        ['step' => '4', 'title' => 'Tinjau', 'desc' => 'Admin memverifikasi', 'icon' => 'check-circle'],
                        ['step' => '5', 'title' => 'Aktif!', 'desc' => 'Bisa diakses semua orang', 'icon' => 'globe'],
                    ];
                @endphp
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    @foreach($steps as $index => $step)
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="text-center group">
                            <div class="relative inline-block mb-3">
                                <div class="w-16 h-16 rounded-2xl bg-white border-2 border-gray-100 group-hover:border-purple-200 flex items-center justify-center mx-auto shadow-sm group-hover:shadow-md transition-all">
                                    <i data-feather="{{ $step['icon'] }}" class="w-7 h-7 text-gray-700 group-hover:text-purple-600"></i>
                                </div>
                                <span class="absolute -top-1.5 -right-1.5 w-6 h-6 bg-white rounded-full flex items-center justify-center text-[10px] font-bold gradient-text shadow border border-gray-100">{{ $step['step'] }}</span>
                            </div>
                            <h3 class="font-bold text-sm text-gray-900">{{ $step['title'] }}</h3>
                            <p class="text-gray-500 text-xs">{{ $step['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ========== SECTION 8: KEUNGGULAN ========== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold mb-4 uppercase tracking-wide">Keunggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Kenapa Pilih <span class="gradient-text">K-amu SKL?</span></h2>
            <p class="text-gray-600 max-w-lg mx-auto">Platform yang dirancang untuk pengalaman belajar terbaik.</p>
        </div>
        @php
            $features = [
                ['title' => 'Sumber Terbuka', 'desc' => 'Kode terbuka, siapa saja bisa berkontribusi.', 'icon' => 'code'],
                ['title' => 'Akses Global', 'desc' => 'Diakses dari mana saja tanpa batas.', 'icon' => 'globe'],
                ['title' => 'Terkurasi Admin', 'desc' => 'Setiap tautan ditinjau untuk kualitas.', 'icon' => 'shield'],
                ['title' => 'Simpan & Nilai', 'desc' => 'Simpan favorit dan beri penilaian.', 'icon' => 'bookmark'],
                ['title' => 'Ramah Bahasa Indonesia', 'desc' => 'Antarmuka Indonesia, konten global.', 'icon' => 'message-circle'],
                ['title' => 'Gratis Selamanya', 'desc' => 'Tanpa biaya tersembunyi.', 'icon' => 'heart'],
            ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($features as $index => $feature)
                <div data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}"
                     class="p-5 rounded-xl border border-gray-100 hover:border-purple-200 hover:shadow-md transition-all duration-300 group bg-white">
                    <div class="w-11 h-11 rounded-xl gradient-bg flex items-center justify-center mb-3">
                        <i data-feather="{{ $feature['icon'] }}" class="w-5 h-5 text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1 group-hover:text-purple-600 transition-colors">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== SECTION 9: TESTIMONI ========== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold mb-4 uppercase tracking-wide">Testimoni</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Apa Kata <span class="gradient-text">Mereka?</span></h2>
            <p class="text-gray-600 max-w-lg mx-auto">Feedback dari pengguna K-amu SKL.</p>
        </div>
        @php
            $testimonials = [
                ['name' => 'Ahmad Rizki', 'role' => 'Mahasiswa IT — UI', 'avatar' => 'https://i.pravatar.cc/80?img=11', 'text' => 'K-amu SKL sangat membantu saya menemukan resource belajar programming gratis yang terkurasi. Dari freeCodeCamp sampai CS50 Harvard, semua ada!', 'rating' => 5],
                ['name' => 'Siti Nurhaliza', 'role' => 'UI/UX Designer — ITB', 'avatar' => 'https://i.pravatar.cc/80?img=5', 'text' => 'Koleksi tools gratis lengkap banget! Saya menemukan Figma tips, UI kits, dan panduan Canva Pro gratis. Sangat membantu!', 'rating' => 5],
                ['name' => 'Budi Santoso', 'role' => 'Fresh Graduate — ITS', 'avatar' => 'https://i.pravatar.cc/80?img=12', 'text' => 'Platform ini membantu saya mempersiapkan karir di tech industry. Resource interview prep dan portfolio building-nya keren.', 'rating' => 5],
            ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($testimonials as $index => $testi)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                     class="bg-white p-6 rounded-xl border border-gray-100 card-hover transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < $testi['rating']; $i++)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">"{{ $testi['text'] }}"</p>
                    <div class="flex items-center gap-3 pt-3 border-t border-gray-50">
                        <img src="{{ $testi['avatar'] }}" alt="{{ $testi['name'] }}" class="w-10 h-10 rounded-full object-cover" loading="lazy">
                        <div>
                            <p class="font-bold text-sm text-gray-800">{{ $testi['name'] }}</p>
                            <p class="text-xs text-purple-600">{{ $testi['role'] }}</p>
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
        <div data-aos="zoom-in" class="gradient-bg rounded-3xl p-10 md:p-14 text-center text-white relative overflow-hidden">
            <div class="absolute top-6 left-6 w-20 h-20 border-2 border-white/10 rounded-full"></div>
            <div class="absolute bottom-6 right-6 w-28 h-28 border-2 border-white/10 rounded-full"></div>
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-3">Siap Mulai Belajar?</h2>
                <p class="text-white/80 max-w-lg mx-auto mb-8">
                    Bergabung dengan {{ number_format($totalUsers) }}+ pengguna K-amu SKL. Akses {{ $totalEducations }}+ link edukasi gratis selamanya.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-purple-600 px-8 py-3.5 rounded-full font-bold hover:bg-gray-50 transition inline-flex items-center justify-center">
                        <i data-feather="user-plus" class="w-5 h-5 mr-2"></i>
                        Daftar Gratis Sekarang
                    </a>
                    <a href="{{ route('explore') }}" class="border-2 border-white/40 text-white px-8 py-3.5 rounded-full font-bold hover:bg-white/10 transition inline-flex items-center justify-center">
                        <i data-feather="compass" class="w-5 h-5 mr-2"></i>
                        Jelajahi Dulu
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
