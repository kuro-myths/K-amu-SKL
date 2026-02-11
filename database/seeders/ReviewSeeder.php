<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $educations = Education::approved()->get();

        if ($users->isEmpty() || $educations->isEmpty()) return;

        $comments = [
            5 => [
                'Sangat membantu! Resource berkualitas tinggi dan gratis.',
                'Luar biasa! Materi sangat lengkap dan mudah dipahami.',
                'Recommended banget! Saya sudah belajar banyak dari sini.',
                'Best free resource yang pernah saya temukan. Terima kasih!',
                'Kualitas setara kursus berbayar. Wajib coba!',
            ],
            4 => [
                'Bagus dan informatif. Beberapa bagian perlu update.',
                'Resource yang solid. Interface mudah digunakan.',
                'Cukup lengkap untuk level beginner sampai intermediate.',
                'Materi berkualitas, meskipun ada beberapa typo kecil.',
            ],
            3 => [
                'Lumayan, tapi masih bisa ditingkatkan lagi.',
                'Cukup baik untuk pemula. Advanced user butuh tambahan resource.',
            ],
        ];

        foreach ($educations->random(min(15, $educations->count())) as $education) {
            $reviewCount = rand(1, 3);
            $reviewers = $users->random(min($reviewCount, $users->count()));

            foreach ($reviewers as $user) {
                $rating = collect([5, 5, 5, 4, 4, 3])->random();
                $commentPool = $comments[$rating];

                Review::updateOrCreate(
                    [
                        'user_id'      => $user->id,
                        'education_id' => $education->id,
                    ],
                    [
                        'rating'  => $rating,
                        'comment' => $commentPool[array_rand($commentPool)],
                    ]
                );
            }
        }
    }
}
