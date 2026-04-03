<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminEducationController extends Controller
{
    public function index(Request $request)
    {
        $query = Education::with(['category', 'creator']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured === '1');
        }

        $educations = $query->latest()->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();
        $pendingCount = Education::pending()->count();

        return view('admin.educations.index', compact('educations', 'categories', 'pendingCount'));
    }

    public function pending()
    {
        $educations = Education::pending()
            ->with(['category', 'creator'])
            ->latest()
            ->paginate(15);

        return view('admin.educations.pending', compact('educations'));
    }

    public function approve(Education $education)
    {
        $education->update(['status' => 'approved']);

        return back()->with('success', "Link '{$education->title}' berhasil di-approve!");
    }

    public function reject(Education $education)
    {
        $education->update([
            'status' => 'rejected',
            'is_featured' => false,
        ]);

        return back()->with('success', "Link '{$education->title}' berhasil di-reject.");
    }

    public function toggleFeatured(Education $education)
    {
        if ($education->status !== 'approved') {
            return back()->with('error', 'Hanya link berstatus approved yang bisa dijadikan unggulan.');
        }

        $education->update([
            'is_featured' => !$education->is_featured,
        ]);

        $message = $education->is_featured
            ? "Link '{$education->title}' berhasil ditandai sebagai unggulan!"
            : "Link '{$education->title}' tidak lagi menjadi unggulan.";

        return back()->with('success', $message);
    }

    public function edit(Education $education)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.educations.edit', compact('education', 'categories'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'url'         => 'required|url|max:500',
            'category_id' => 'required|exists:categories,id',
            'level'       => 'required|in:basic,intermediate,advanced,free',
            'status'      => 'required|in:pending,approved,rejected',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        if ($validated['status'] !== 'approved') {
            $validated['is_featured'] = false;
        }

        $education->update($validated);

        return redirect()->route('admin.educations.index')
            ->with('success', 'Link berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.educations.index')
            ->with('success', 'Link berhasil dihapus!');
    }
}
