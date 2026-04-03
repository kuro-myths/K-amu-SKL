@extends('layouts.app')
@section('title', 'Kategori')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Semua <span class="gradient-text">Kategori</span></h1>
            <p class="text-gray-500">Pilih bidang yang ingin kamu pelajari</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('explore', ['category' => $category->slug]) }}"
                   class="glass p-6 rounded-2xl text-center card-hover transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <i data-feather="{{ $category->icon ?? 'folder' }}" class="w-7 h-7 text-white"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $category->approved_educations_count }} tautan edukasi</p>
                    @if($category->description)
                        <p class="text-xs text-gray-400 mt-2 line-clamp-2">{{ $category->description }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
