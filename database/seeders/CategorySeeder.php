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
                'name'        => 'Pemrograman',
                'slug'        => 'programming',
                'description' => 'Bahasa pemrograman, framework, dan tutorial coding',
                'icon'        => 'code',
            ],
            [
                'name'        => 'Desain',
                'slug'        => 'design',
                'description' => 'Desain grafis, ilustrasi, dan tools kreatif',
                'icon'        => 'pen-tool',
            ],
            [
                'name'        => 'Bisnis',
                'slug'        => 'business',
                'description' => 'Bisnis, marketing, dan entrepreneurship',
                'icon'        => 'briefcase',
            ],
            [
                'name'        => 'Kecerdasan Buatan',
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
                'icon'        => 'hash',
            ],
            [
                'name'        => 'Alat Developer',
                'slug'        => 'tools-developer',
                'description' => 'Tools, IDE, extensions, dan resource developer',
                'icon'        => 'tool',
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
                'name'        => 'Karier',
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
