@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')
@section('title', $education->title)

@section('content')
<section class="py-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('explore') }}" class="hover:text-purple-600 transition">Explore</a>
            <i data-feather="chevron-right" class="w-4 h-4"></i>
            <a href="{{ route('explore', ['category' => $education->category->slug]) }}" class="hover:text-purple-600 transition">{{ $education->category->name }}</a>
            <i data-feather="chevron-right" class="w-4 h-4"></i>
            <span class="text-gray-800">{{ Str::limit($education->title, 40) }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Main --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="px-3 py-1 rounded-lg bg-purple-50 text-purple-600 text-sm font-medium">{{ $education->category->name }}</span>
                        <span class="px-3 py-1 rounded-lg bg-teal-50 text-teal-600 text-sm font-medium">{{ ucfirst($education->level) }}</span>
                        <span class="px-3 py-1 rounded-lg bg-gray-50 text-gray-500 text-sm flex items-center">
                            <i data-feather="eye" class="w-3 h-3 mr-1"></i>{{ number_format($education->views) }}
                        </span>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">{{ $education->title }}</h1>
                    <p class="text-gray-600 leading-relaxed mb-6">{{ $education->description }}</p>

                    <div class="flex items-center gap-4 mb-6 text-sm text-gray-500">
                        <span class="flex items-center"><i data-feather="user" class="w-4 h-4 mr-1"></i>{{ $education->creator->name ?? 'Anonim' }}</span>
                        <span class="flex items-center"><i data-feather="calendar" class="w-4 h-4 mr-1"></i>{{ $education->created_at->format('d M Y') }}</span>
                    </div>

                    <a href="{{ $education->url }}" target="_blank" rel="noopener" class="gradient-bg text-white px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition glow-hover inline-flex items-center">
                        <i data-feather="external-link" class="w-5 h-5 mr-2"></i>
                        Kunjungi Link
                    </a>

                    @auth
                        <form action="{{ route('bookmark.toggle', $education) }}" method="POST" class="inline ml-3">
                            @csrf
                            <button type="submit" class="border-2 border-purple-200 text-purple-600 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 transition inline-flex items-center">
                                <i data-feather="bookmark" class="w-5 h-5 mr-2"></i>
                                Bookmark
                            </button>
                        </form>
                    @endauth
                </div>

                {{-- Reviews --}}
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 mt-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Review & Rating</h2>

                    @auth
                        <form action="{{ route('review.store', $education) }}" method="POST" class="mb-8 p-4 bg-gray-50 rounded-xl">
                            @csrf
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                                <select name="rating" required class="px-4 py-2 rounded-lg border border-gray-200">
                                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                    <option value="4">⭐⭐⭐⭐ (4)</option>
                                    <option value="3">⭐⭐⭐ (3)</option>
                                    <option value="2">⭐⭐ (2)</option>
                                    <option value="1">⭐ (1)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea name="comment" rows="2" placeholder="Tulis komentar (opsional)..."
                                    class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-purple-400 outline-none"></textarea>
                            </div>
                            <button type="submit" class="gradient-bg text-white px-5 py-2 rounded-lg text-sm font-semibold hover:opacity-90 transition">
                                Kirim Review
                            </button>
                        </form>
                    @endauth

                    @forelse($education->reviews as $review)
                        <div class="border-b border-gray-100 pb-4 mb-4 last:border-0">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center text-white text-xs font-bold">{{ substr($review->user->name, 0, 1) }}</div>
                                    <span class="font-semibold text-sm text-gray-800">{{ $review->user->name }}</span>
                                    <div class="flex">
                                        @for($i = 0; $i < $review->rating; $i++)
                                            <i data-feather="star" class="w-3 h-3 text-yellow-400 fill-current"></i>
                                        @endfor
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            @if($review->comment)
                                <p class="text-gray-600 text-sm pl-10">{{ $review->comment }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-400 text-center py-4">Belum ada review.</p>
                    @endforelse
                </div>
            </div>

            {{-- Sidebar --}}
            <div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 sticky top-24">
                    <h3 class="font-bold text-gray-900 mb-4">Materi Terkait</h3>
                    @forelse($relatedEducations as $rel)
                        <a href="{{ route('education.show', $rel) }}" class="block p-3 rounded-xl hover:bg-gray-50 transition mb-2">
                            <h4 class="font-semibold text-sm text-gray-800 line-clamp-2">{{ $rel->title }}</h4>
                            <span class="text-xs text-gray-400">{{ ucfirst($rel->level) }} · {{ number_format($rel->views) }} views</span>
                        </a>
                    @empty
                        <p class="text-gray-400 text-sm">Belum ada materi terkait.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
