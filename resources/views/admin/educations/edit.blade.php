@extends('layouts.app')
@section('title', 'Edit Education')

@section('content')
<section class="py-10">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.educations.index') }}" class="text-gray-500 hover:text-purple-600 text-sm flex items-center mb-6">
            <i data-feather="arrow-left" class="w-4 h-4 mr-1"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Link: {{ Str::limit($education->title, 40) }}</h1>

        <form method="POST" action="{{ route('admin.educations.update', $education) }}" class="bg-white rounded-2xl p-8 border border-gray-100 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $education->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none transition">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                <input type="url" name="url" value="{{ old('url', $education->url) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none transition">{{ old('description', $education->description) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $education->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                    <select name="level" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                        @foreach(['basic','intermediate','advanced','free'] as $lvl)
                            <option value="{{ $lvl }}" {{ old('level', $education->level) == $lvl ? 'selected' : '' }}>{{ ucfirst($lvl) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                    @foreach(['pending','approved','rejected'] as $st)
                        <option value="{{ $st }}" {{ old('status', $education->status) == $st ? 'selected' : '' }}>{{ ucfirst($st) }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full gradient-bg text-white py-3 rounded-xl font-semibold hover:opacity-90 transition glow-hover">Simpan</button>
        </form>
    </div>
</section>
@endsection
