<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Education $education)
    {
        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        // Cek apakah sudah pernah review
        $existing = Review::where('user_id', Auth::id())
            ->where('education_id', $education->id)
            ->first();

        if ($existing) {
            $existing->update($validated);
            $message = 'Review berhasil diperbarui!';
        } else {
            Review::create([
                'user_id'      => Auth::id(),
                'education_id' => $education->id,
                'rating'       => $validated['rating'],
                'comment'      => $validated['comment'] ?? null,
            ]);
            $message = 'Review berhasil ditambahkan!';
        }

        return back()->with('success', $message);
    }

    public function destroy(Review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $review->delete();
        return back()->with('success', 'Review berhasil dihapus!');
    }
}
