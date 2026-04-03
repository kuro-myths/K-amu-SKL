@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<section class="py-10">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.categories.index') }}" class="text-gray-500 hover:text-purple-600 text-sm flex items-center mb-6">
            <i data-feather="arrow-left" class="w-4 h-4 mr-1"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Tambah Kategori</h1>

        <form method="POST" action="{{ route('admin.categories.store') }}" class="bg-white rounded-2xl p-8 border border-gray-100 space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition @error('name') border-red-400 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition">{{ old('description') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ikon (Feather)</label>
                <input type="text" name="icon" value="{{ old('icon', 'folder') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none transition" placeholder="folder, code, book, dll">
            </div>
            <button type="submit" class="w-full gradient-bg text-white py-3 rounded-xl font-semibold hover:opacity-90 transition glow-hover">Simpan</button>
        </form>
    </div>
</section>
@endsection
