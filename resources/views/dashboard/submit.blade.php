@extends('layouts.app')
@section('title', 'Kirim Tautan Edukasi')

@section('content')
<section class="py-10">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-purple-600 text-sm flex items-center mb-4">
                <i data-feather="arrow-left" class="w-4 h-4 mr-1"></i> Kembali ke Dashboard
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Kirim Tautan Edukasi</h1>
            <p class="text-gray-500 text-sm">Bagikan sumber belajar gratis</p>
        </div>

        <form method="POST" action="{{ route('submit.store') }}" class="bg-white rounded-2xl p-8 border border-gray-100 space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Belajar Laravel dari Nol"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition @error('title') border-red-400 @enderror">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                <input type="url" name="url" value="{{ old('url') }}" required placeholder="https://..."
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition @error('url') border-red-400 @enderror">
                @error('url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Deskripsikan singkat resource ini..."
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none @error('category_id') border-red-400 @enderror">
                        <option value="">Pilih—</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                    <select name="level" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none @error('level') border-red-400 @enderror">
                        <option value="">Pilih—</option>
                        <option value="basic" {{ old('level') == 'basic' ? 'selected' : '' }}>Dasar</option>
                        <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Menengah</option>
                        <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Lanjutan</option>
                        <option value="free" {{ old('level') == 'free' ? 'selected' : '' }}>Gratis</option>
                    </select>
                    @error('level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <button type="submit" class="w-full gradient-bg text-white py-3 rounded-xl font-semibold hover:opacity-90 transition glow-hover">
                Kirim Tautan
            </button>
        </form>
    </div>
</section>
@endsection
