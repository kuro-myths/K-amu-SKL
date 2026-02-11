@extends('layouts.app')
@section('title', 'Link Pending')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Link <span class="gradient-text">Menunggu Approval</span></h1>
            <a href="{{ route('admin.educations.index') }}" class="text-gray-500 hover:text-purple-600 text-sm flex items-center">
                <i data-feather="arrow-left" class="w-4 h-4 mr-1"></i> Semua Link
            </a>
        </div>

        @forelse($educations as $edu)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 mb-4 card-hover">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 rounded-lg bg-purple-50 text-purple-600 text-xs font-medium">{{ $edu->category->name }}</span>
                            <span class="px-2 py-1 rounded-lg bg-teal-50 text-teal-600 text-xs font-medium">{{ ucfirst($edu->level) }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">{{ $edu->title }}</h3>
                        <p class="text-gray-500 text-sm mb-2">{{ $edu->description }}</p>
                        <a href="{{ $edu->url }}" target="_blank" class="text-purple-600 text-sm hover:underline flex items-center">
                            <i data-feather="external-link" class="w-3 h-3 mr-1"></i>{{ Str::limit($edu->url, 50) }}
                        </a>
                        <p class="text-xs text-gray-400 mt-2">Oleh {{ $edu->creator->name ?? 'Anonim' }} · {{ $edu->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex gap-2 ml-4">
                        <form action="{{ route('admin.educations.approve', $edu) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="px-4 py-2 bg-green-50 text-green-600 rounded-xl text-sm font-semibold hover:bg-green-100 transition">
                                <i data-feather="check" class="w-4 h-4 inline mr-1"></i>Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.educations.reject', $edu) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="px-4 py-2 bg-red-50 text-red-600 rounded-xl text-sm font-semibold hover:bg-red-100 transition">
                                <i data-feather="x" class="w-4 h-4 inline mr-1"></i>Reject
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-20">
                <i data-feather="check-circle" class="w-16 h-16 text-green-300 mx-auto mb-4"></i>
                <p class="text-gray-500 text-lg">Tidak ada link yang menunggu approval!</p>
            </div>
        @endforelse

        <div class="mt-6">{{ $educations->links() }}</div>
    </div>
</section>
@endsection
