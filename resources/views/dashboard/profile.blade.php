@extends('layouts.app')
@section('title', 'Profil Saya')

@section('content')
<section class="py-10">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-purple-600 text-sm flex items-center mb-4">
                <i data-feather="arrow-left" class="w-4 h-4 mr-1"></i> Dashboard
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Profil Saya</h1>
        </div>

        <div class="bg-white rounded-2xl p-8 border border-gray-100">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" alt="" class="w-16 h-16 rounded-full object-cover">
                    @else
                        <span class="text-white text-2xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                    @endif
                </div>
                <div>
                    <h2 class="font-bold text-gray-900 text-lg">{{ $user->name }}</h2>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                    <span class="text-xs px-2 py-0.5 rounded bg-purple-50 text-purple-600 mt-1 inline-block">{{ ucfirst($user->role) }}</span>
                </div>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition @error('name') border-red-400 @enderror">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition @error('email') border-red-400 @enderror">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="gradient-bg text-white px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition glow-hover">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
