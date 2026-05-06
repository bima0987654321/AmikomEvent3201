<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $category = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it'
        ]);

        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertaiment',
            'slug' => 'entertaiment',
        ]);

        $category3 = \App\Models\Category::firstOrCreate([
            'name' => 'Webinar',
            'slug' => 'webinar',
        ]);

        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI Summit & Expo 2026',
            'description' => 'Jelajahi tren terkini dalam bidang Artificial Intelligence',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 45000,
            'stock' => 150,
            'poster_path' => 'posters/event-2.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'UI/UX',
            'description' => 'elemen kunci dalam desain produk digital yang memastikan aplikasi atau web tidak hanya menarik secara visual',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Cinema 2',
            'price' => 50000,
            'stock' => 200,
            'poster_path' => 'posters/event-3.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Masterclass',
            'description' => 'Jelajahi tren terkini',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Gedung 5',
            'price' => 60000,
            'stock' => 350,
            'poster_path' => 'posters/event-4.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen E-Sport besar besaran',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Game Center',
            'price' => 45000,
            'stock' => 300,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Web Developer',
            'description' => 'belajar cara membuat web ',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Gedung 7',
            'price' => 35000,
            'stock' => 150,
            'poster_path' => 'posters/event-6.png',
        ]);

    }

}
