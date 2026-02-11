<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $educations = Education::approved()->get();

        if ($users->isEmpty() || $educations->isEmpty()) return;

        foreach ($users as $user) {
            $bookmarkCount = rand(3, 8);
            $toBookmark = $educations->random(min($bookmarkCount, $educations->count()));

            foreach ($toBookmark as $education) {
                Bookmark::updateOrCreate(
                    [
                        'user_id'      => $user->id,
                        'education_id' => $education->id,
                    ]
                );
            }
        }
    }
}
