@extends('layouts.app')
@section('title', 'Kelola Pengguna')

@section('content')
<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-8">Kelola Pengguna</h1>

        {{-- Search --}}
        <form method="GET" action="{{ route('admin.users.index') }}" class="mb-6 flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                class="flex-1 px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none transition">
            <select name="role" class="px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-400 outline-none">
                <option value="">Semua Peran</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>Pengguna</option>
            </select>
            <button type="submit" class="gradient-bg text-white px-6 py-3 rounded-xl font-semibold hover:opacity-90 transition">Terapkan</button>
        </form>

        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Pengguna</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Peran</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Tautan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Sumber</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white text-xs font-bold">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="font-medium text-gray-800">{{ $user->name }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $user->role === 'admin' ? 'bg-purple-50 text-purple-600' : 'bg-gray-50 text-gray-600' }}">
                                    {{ $user->role_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->educations_count }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->provider ?? 'email' }}</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST" class="inline mr-2">
                                    @csrf @method('PATCH')
                                    <button class="text-purple-600 hover:text-purple-700 text-sm font-medium">Ubah Peran</button>
                                </form>
                                @if($user->id !== Auth::id())
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pengguna ini?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:text-red-600 text-sm font-medium">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $users->links() }}</div>
    </div>
</section>
@endsection
