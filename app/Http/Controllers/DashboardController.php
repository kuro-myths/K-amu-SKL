<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Education;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $totalLinks = $user->educations()->count();
        $totalBookmarks = $user->bookmarks()->count();
        $pendingLinks = $user->educations()->where('status', 'pending')->count();
        $approvedLinks = $user->educations()->where('status', 'approved')->count();

        $recentEducations = $user->educations()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalLinks',
            'totalBookmarks',
            'pendingLinks',
            'approvedLinks',
            'recentEducations'
        ));
    }

    public function submit()
    {
        $categories = Category::orderBy('name')->get();
        return view('dashboard.submit', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'url'         => 'required|url|max:500',
            'category_id' => 'required|exists:categories,id',
            'level'       => 'required|in:basic,intermediate,advanced,free',
        ]);

        $validated['created_by'] = Auth::id();
        $validated['status'] = 'pending';

        Education::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Link berhasil disubmit! Menunggu approval admin.');
    }

    public function edit(Education $education)
    {
        $this->authorize('update', $education);
        $categories = Category::orderBy('name')->get();
        return view('dashboard.edit', compact('education', 'categories'));
    }

    public function update(Request $request, Education $education)
    {
        $this->authorize('update', $education);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'url'         => 'required|url|max:500',
            'category_id' => 'required|exists:categories,id',
            'level'       => 'required|in:basic,intermediate,advanced,free',
        ]);

        $education->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Link berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        $this->authorize('delete', $education);
        $education->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Link berhasil dihapus!');
    }

    public function bookmarks()
    {
        /** @var User $user */
        $user = Auth::user();
        $bookmarks = $user->bookmarks()
            ->with('education.category')
            ->latest()
            ->paginate(12);

        return view('dashboard.bookmarks', compact('bookmarks'));
    }

    public function toggleBookmark(Education $education)
    {
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('education_id', $education->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            $message = 'Bookmark dihapus.';
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'education_id' => $education->id,
            ]);
            $message = 'Berhasil di-bookmark!';
        }

        return back()->with('success', $message);
    }

    public function profile()
    {
        return view('dashboard.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
