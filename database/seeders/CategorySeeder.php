<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Programming',
                'slug'        => 'programming',
                'description' => 'Bahasa pemrograman, framework, dan tutorial coding',
                'icon'        => 'code',
            ],
            [
                'name'        => 'Design',
                'slug'        => 'design',
                'description' => 'Desain grafis, ilustrasi, dan tools kreatif',
                'icon'        => 'palette',
            ],
            [
                'name'        => 'Business',
                'slug'        => 'business',
                'description' => 'Bisnis, marketing, dan entrepreneurship',
                'icon'        => 'briefcase',
            ],
            [
                'name'        => 'Artificial Intelligence',
                'slug'        => 'artificial-intelligence',
                'description' => 'Machine learning, deep learning, dan AI tools',
                'icon'        => 'cpu',
            ],
            [
                'name'        => 'Bahasa',
                'slug'        => 'bahasa',
                'description' => 'Belajar bahasa asing dan komunikasi',
                'icon'        => 'globe',
            ],
            [
                'name'        => 'Matematika',
                'slug'        => 'matematika',
                'description' => 'Matematika, statistik, dan logika',
                'icon'        => 'calculator',
            ],
            [
                'name'        => 'Tools Developer',
                'slug'        => 'tools-developer',
                'description' => 'Tools, IDE, extensions, dan resource developer',
                'icon'        => 'wrench',
            ],
            [
                'name'        => 'Referensi Akademik',
                'slug'        => 'referensi-akademik',
                'description' => 'Jurnal, paper, ebook, dan referensi ilmiah',
                'icon'        => 'book-open',
            ],
            [
                'name'        => 'UI/UX',
                'slug'        => 'ui-ux',
                'description' => 'User Interface, User Experience, dan prototyping',
                'icon'        => 'layout',
            ],
            [
                'name'        => 'Career',
                'slug'        => 'career',
                'description' => 'Tips karir, CV, interview, dan pengembangan profesional',
                'icon'        => 'trending-up',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
