<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $query = Education::approved()
            ->with(['category', 'creator'])
            ->withAvg('reviews', 'rating');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter kategori
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Filter level
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        // Filter unggulan
        if ($request->boolean('featured')) {
            $query->featured();
        }

        // Sort
        $sort = $request->input('sort', 'latest');
        match ($sort) {
            'popular' => $query->popular(),
            'rating'  => $query->orderByDesc('reviews_avg_rating')->orderByDesc('views'),
            default   => $query->latest(),
        };

        $educations = $query->paginate(12)->withQueryString();
        $categories = Category::withCount('approvedEducations')->get();

        return view('explore.index', compact('educations', 'categories'));
    }

    public function show(Education $education)
    {
        if ($education->status !== 'approved') {
            abort(404);
        }

        $education->incrementViews();
        $education->load(['category', 'creator', 'reviews.user']);

        $relatedEducations = Education::approved()
            ->where('category_id', $education->category_id)
            ->where('id', '!=', $education->id)
            ->take(4)
            ->get();

        return view('explore.show', compact('education', 'relatedEducations'));
    }

    public function categories()
    {
        $categories = Category::withCount('approvedEducations')->get();
        return view('explore.categories', compact('categories'));
    }
}
