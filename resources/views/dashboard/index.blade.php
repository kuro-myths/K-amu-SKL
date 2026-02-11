@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-500 text-sm">Selamat datang, {{ Auth::user()->name }}!</p>
            </div>
            <a href="{{ route('submit') }}" class="gradient-bg text-white px-6 py-3 rounded-xl font-semibold hover:opacity-90 transition inline-flex items-center">
                <i data-feather="plus" class="w-5 h-5 mr-2"></i>
                Submit Link
            </a>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center mb-3">
                    <i data-feather="link" class="w-5 h-5 text-purple-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $totalLinks }}</p>
                <p class="text-sm text-gray-500">Total Link</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-3">
                    <i data-feather="check-circle" class="w-5 h-5 text-green-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $approvedLinks }}</p>
                <p class="text-sm text-gray-500">Approved</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center mb-3">
                    <i data-feather="clock" class="w-5 h-5 text-yellow-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $pendingLinks }}</p>
                <p class="text-sm text-gray-500">Pending</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center mb-3">
                    <i data-feather="bookmark" class="w-5 h-5 text-teal-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $totalBookmarks }}</p>
                <p class="text-sm text-gray-500">Bookmark</p>
            </div>
        </div>

        {{-- Recent Links --}}
        <div class="bg-white rounded-2xl p-6 border border-gray-100">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Link Terakhir Kamu</h2>
            @forelse($recentEducations as $edu)
                <div class="flex items-center justify-between py-3 border-b border-gray-50 last:border-0">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800">{{ $edu->title }}</h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs px-2 py-0.5 rounded bg-purple-50 text-purple-600">{{ $edu->category->name }}</span>
                            <span class="text-xs px-2 py-0.5 rounded
                                {{ $edu->status === 'approved' ? 'bg-green-50 text-green-600' : ($edu->status === 'pending' ? 'bg-yellow-50 text-yellow-600' : 'bg-red-50 text-red-600') }}">
                                {{ ucfirst($edu->status) }}
                            </span>
                            <span class="text-xs text-gray-400">{{ $edu->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 ml-4">
                        <a href="{{ route('education.edit', $edu) }}" class="text-gray-400 hover:text-purple-600 transition" title="Edit">
                            <i data-feather="edit-2" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('education.destroy', $edu) }}" method="POST" onsubmit="return confirm('Hapus link ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Hapus">
                                <i data-feather="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 text-center py-6">Belum ada link. <a href="{{ route('submit') }}" class="text-purple-600 font-semibold">Submit sekarang!</a></p>
            @endforelse
        </div>
    </div>
</section>
@endsection
