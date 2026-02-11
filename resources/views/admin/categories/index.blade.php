@extends('layouts.app')
@section('title', 'Kelola Kategori')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Kelola Kategori</h1>
            <a href="{{ route('admin.categories.create') }}" class="gradient-bg text-white px-6 py-3 rounded-xl font-semibold hover:opacity-90 transition inline-flex items-center">
                <i data-feather="plus" class="w-5 h-5 mr-2"></i> Tambah
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Link</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($categories as $cat)
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg gradient-bg flex items-center justify-center"><i data-feather="{{ $cat->icon ?? 'folder' }}" class="w-4 h-4 text-white"></i></div>
                                {{ $cat->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $cat->slug }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $cat->educations_count ?? 0 }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.categories.edit', $cat) }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium mr-3">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 text-sm font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
