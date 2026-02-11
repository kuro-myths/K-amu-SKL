<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('approvedEducations')->get();
        $popularEducations = Education::approved()
            ->popular()
            ->with(['category', 'creator'])
            ->take(8)
            ->get();
        $totalUsers = User::count();
        $totalEducations = Education::approved()->count();
        $totalCategories = Category::count();

        return view('landing', compact(
            'categories',
            'popularEducations',
            'totalUsers',
            'totalEducations',
            'totalCategories'
        ));
    }
}
