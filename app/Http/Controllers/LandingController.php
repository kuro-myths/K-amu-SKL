<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use App\Models\User;

class LandingController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('approvedEducations')->get();
        $featuredEducations = Education::approved()
            ->featured()
            ->with(['category', 'creator'])
            ->withAvg('reviews', 'rating')
            ->orderByDesc('views')
            ->take(6)
            ->get();
        $popularEducations = Education::approved()
            ->popular()
            ->with(['category', 'creator'])
            ->take(8)
            ->get();
        $totalUsers = User::count();
        $totalEducations = Education::approved()->count();
        $totalCategories = Category::count();

        return view('beranda', compact(
            'categories',
            'featuredEducations',
            'popularEducations',
            'totalUsers',
            'totalEducations',
            'totalCategories'
        ));
    }
}
