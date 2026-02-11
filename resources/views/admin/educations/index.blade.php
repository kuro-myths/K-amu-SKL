@extends('layouts.app')
@section('title', 'Kelola Link Edukasi')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Kelola Link Edukasi</h1>
            <a href="{{ route('admin.educations.pending') }}" class="border-2 border-yellow-300 text-yellow-600 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-yellow-50 transition inline-flex items-center">
                <i data-feather="clock" class="w-4 h-4 mr-2"></i> Pending ({{ $pendingCount ?? 0 }})
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Views</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($educations as $edu)
                        <tr>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-800 line-clamp-1">{{ $edu->title }}</p>
                                <p class="text-xs text-gray-400">{{ $edu->creator->name ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $edu->category->name }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-lg text-xs font-medium
                                    {{ $edu->status === 'approved' ? 'bg-green-50 text-green-600' : ($edu->status === 'pending' ? 'bg-yellow-50 text-yellow-600' : 'bg-red-50 text-red-600') }}">
                                    {{ ucfirst($edu->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ number_format($edu->views) }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.educations.edit', $edu) }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium mr-2">Edit</a>
                                <form action="{{ route('admin.educations.destroy', $edu) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-600 text-sm font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $educations->links() }}</div>
    </div>
</section>
@endsection
