<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Bilişim Teknolojileri', 'slug' => 'bilisim-teknolojileri', 'icon' => 'fa-laptop-code'],
            ['name' => 'Pazarlama', 'slug' => 'pazarlama', 'icon' => 'fa-bullhorn'],
            ['name' => 'Satış', 'slug' => 'satis', 'icon' => 'fa-handshake'],
            ['name' => 'İnsan Kaynakları', 'slug' => 'insan-kaynaklari', 'icon' => 'fa-users'],
            ['name' => 'Finans', 'slug' => 'finans', 'icon' => 'fa-chart-line'],
            ['name' => 'Tasarım', 'slug' => 'tasarim', 'icon' => 'fa-paint-brush'],
            ['name' => 'Mühendislik', 'slug' => 'muhendislik', 'icon' => 'fa-cogs'],
            ['name' => 'Eğitim', 'slug' => 'egitim', 'icon' => 'fa-graduation-cap'],
            ['name' => 'Sağlık', 'slug' => 'saglik', 'icon' => 'fa-heartbeat'],
            ['name' => 'Hukuk', 'slug' => 'hukuk', 'icon' => 'fa-balance-scale']
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
