@extends('layouts.app')
@section('title', 'Bookmark Saya')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Bookmark Saya</h1>
                <p class="text-gray-500 text-sm">Link edukasi yang kamu simpan</p>
            </div>
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-purple-600 text-sm flex items-center">
                <i data-feather="arrow-left" class="w-4 h-4 mr-1"></i> Dashboard
            </a>
        </div>

        @if($bookmarks->isEmpty())
            <div class="text-center py-20">
                <i data-feather="bookmark" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
                <p class="text-gray-500 text-lg">Belum ada bookmark.</p>
                <a href="{{ route('explore') }}" class="text-purple-600 font-semibold mt-2 inline-block">Jelajahi edukasi</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bookmarks as $bm)
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 card-hover transition-all duration-300">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-1 rounded-lg bg-purple-50 text-purple-600 text-xs font-medium">{{ $bm->education->category->name }}</span>
                            <span class="px-2 py-1 rounded-lg bg-teal-50 text-teal-600 text-xs font-medium">{{ ucfirst($bm->education->level) }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2 line-clamp-2">{{ $bm->education->title }}</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $bm->education->description }}</p>
                        <div class="flex items-center justify-between">
                            <form action="{{ route('bookmark.toggle', $bm->education) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-400 hover:text-red-500 text-sm flex items-center transition">
                                    <i data-feather="x" class="w-4 h-4 mr-1"></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('education.show', $bm->education) }}" class="text-purple-600 text-sm font-semibold hover:text-purple-700 transition flex items-center">
                                Detail <i data-feather="arrow-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">{{ $bookmarks->links() }}</div>
        @endif
    </div>
</section>
@endsection
