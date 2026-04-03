<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalEducations = Education::count();
        $pendingEducations = Education::pending()->count();
        $featuredEducations = Education::approved()->featured()->count();
        $totalCategories = Category::count();

        $categoryStats = Category::withCount('approvedEducations')
            ->orderByDesc('approved_educations_count')
            ->get();

        $recentPending = Education::pending()
            ->with(['category', 'creator'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalEducations',
            'pendingEducations',
            'featuredEducations',
            'totalCategories',
            'categoryStats',
            'recentPending'
        ));
    }
}
