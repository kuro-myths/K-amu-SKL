@extends('layouts.app')
@section('title', 'Jelajahi Edukasi')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Jelajahi <span class="gradient-text">Edukasi</span></h1>
            <p class="text-gray-500">Temukan resource gratis terbaik untuk belajar</p>
        </div>

        {{-- Search & Filters --}}
        <form method="GET" action="{{ route('explore') }}" class="glass rounded-2xl p-6 mb-8">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <i data-feather="search" class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari materi, kursus, tools..."
                        class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition">
                </div>
                <select name="category" class="px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }} ({{ $cat->approved_educations_count }})</option>
                    @endforeach
                </select>
                <select name="level" class="px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                    <option value="">Semua Level</option>
                    <option value="basic" {{ request('level') == 'basic' ? 'selected' : '' }}>Basic</option>
                    <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                    <option value="free" {{ request('level') == 'free' ? 'selected' : '' }}>Free</option>
                </select>
                <select name="sort" class="px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Terpopuler</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                </select>
                <label class="inline-flex items-center gap-2 px-4 py-3 rounded-xl border border-gray-200 bg-white">
                    <input type="checkbox" name="featured" value="1" {{ request('featured') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-400">
                    <span class="text-sm font-medium text-gray-700">Unggulan</span>
                </label>
                <button type="submit" class="gradient-bg text-white px-6 py-3 rounded-xl font-semibold hover:opacity-90 transition">
                    Filter
                </button>
            </div>
        </form>

        {{-- Results --}}
        @if($educations->isEmpty())
            <div class="text-center py-20">
                <i data-feather="inbox" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada materi yang ditemukan.</p>
                <a href="{{ route('explore') }}" class="text-purple-600 font-semibold mt-2 inline-block">Reset filter</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($educations as $edu)
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 card-hover transition-all duration-300">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-1 rounded-lg bg-purple-50 text-purple-600 text-xs font-medium">{{ $edu->category->name }}</span>
                            <span class="px-2 py-1 rounded-lg bg-teal-50 text-teal-600 text-xs font-medium">{{ ucfirst($edu->level) }}</span>
                            @if($edu->is_featured)
                                <span class="px-2 py-1 rounded-lg bg-yellow-50 text-yellow-700 text-xs font-semibold">Unggulan</span>
                            @endif
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2 line-clamp-2">{{ $edu->title }}</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3">{{ $edu->description }}</p>
                        <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                            <div class="flex items-center gap-3 text-xs text-gray-400">
                                <span class="flex items-center"><i data-feather="eye" class="w-3 h-3 mr-1"></i>{{ number_format($edu->views) }}</span>
                                <span class="flex items-center"><i data-feather="star" class="w-3 h-3 mr-1"></i>{{ number_format((float) ($edu->reviews_avg_rating ?? 0), 1) }}</span>
                            </div>
                            <a href="{{ route('education.show', $edu) }}" class="text-purple-600 text-sm font-semibold hover:text-purple-700 transition flex items-center">
                                Detail <i data-feather="arrow-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $educations->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
