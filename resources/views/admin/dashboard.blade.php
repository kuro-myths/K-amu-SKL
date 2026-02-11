@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
            <p class="text-gray-500 text-sm">Overview platform K-amu SKL</p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center mb-3">
                    <i data-feather="users" class="w-5 h-5 text-purple-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
                <p class="text-sm text-gray-500">Total User</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center mb-3">
                    <i data-feather="link" class="w-5 h-5 text-teal-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $totalEducations }}</p>
                <p class="text-sm text-gray-500">Total Link</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center mb-3">
                    <i data-feather="clock" class="w-5 h-5 text-yellow-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $pendingEducations }}</p>
                <p class="text-sm text-gray-500">Menunggu Approval</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 card-hover">
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-3">
                    <i data-feather="grid" class="w-5 h-5 text-green-500"></i>
                </div>
                <p class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
                <p class="text-sm text-gray-500">Kategori</p>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <a href="{{ route('admin.educations.pending') }}" class="bg-white rounded-2xl p-5 border border-gray-100 card-hover flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                    <i data-feather="check-circle" class="w-6 h-6 text-yellow-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Review Pending</h3>
                    <p class="text-sm text-gray-500">{{ $pendingEducations }} link menunggu</p>
                </div>
            </a>
            <a href="{{ route('admin.categories.index') }}" class="bg-white rounded-2xl p-5 border border-gray-100 card-hover flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                    <i data-feather="folder" class="w-6 h-6 text-purple-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Kelola Kategori</h3>
                    <p class="text-sm text-gray-500">{{ $totalCategories }} kategori</p>
                </div>
            </a>
            <a href="{{ route('admin.users.index') }}" class="bg-white rounded-2xl p-5 border border-gray-100 card-hover flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-teal-50 flex items-center justify-center">
                    <i data-feather="users" class="w-6 h-6 text-teal-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Kelola User</h3>
                    <p class="text-sm text-gray-500">{{ $totalUsers }} user terdaftar</p>
                </div>
            </a>
        </div>

        {{-- Recent Pending --}}
        @if($recentPending->isNotEmpty())
        <div class="bg-white rounded-2xl p-6 border border-gray-100">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Link Pending Terbaru</h2>
            @foreach($recentPending as $edu)
                <div class="flex items-center justify-between py-3 border-b border-gray-50 last:border-0">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $edu->title }}</h3>
                        <p class="text-xs text-gray-500">{{ $edu->creator->name ?? 'Anonim' }} · {{ $edu->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('admin.educations.approve', $edu) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="px-3 py-1 bg-green-50 text-green-600 rounded-lg text-sm font-medium hover:bg-green-100 transition">Approve</button>
                        </form>
                        <form action="{{ route('admin.educations.reject', $edu) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="px-3 py-1 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">Reject</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
