<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('courses')->insert([
            ['title' => 'Dasar Hidroponik untuk Pemula', 'instructor' => 'Dimas Prakoso', 'duration' => '3 jam', 'image' => 'hydroponic.svg', 'price' => 79000, 'category' => 'Hidroponik', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Merancang Kebun di Lahan Sempit', 'instructor' => 'Nadia Wulandari', 'duration' => '2,5 jam', 'image' => 'small-garden.svg', 'price' => 69000, 'category' => 'Urban Gardening', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Membuat Kompos dari Sampah Dapur', 'instructor' => 'Raka Firmansyah', 'duration' => '2 jam', 'image' => 'compost.svg', 'price' => 59000, 'category' => 'Kompos', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Budidaya Microgreens di Rumah', 'instructor' => 'Sinta Maharani', 'duration' => '3,5 jam', 'image' => 'microgreens.svg', 'price' => 89000, 'category' => 'Budidaya', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Menanam Sayuran Organik', 'instructor' => 'Budi Santoso', 'duration' => '4 jam', 'image' => 'organic-vegetables.svg', 'price' => 99000, 'category' => 'Budidaya', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Perawatan Tanaman Hias Indoor', 'instructor' => 'Alya Permata', 'duration' => '2 jam', 'image' => 'indoor-plants.svg', 'price' => 65000, 'category' => 'Tanaman Hias', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sistem Irigasi Tetes Sederhana', 'instructor' => 'Fajar Nugroho', 'duration' => '3 jam', 'image' => 'irrigation.svg', 'price' => 85000, 'category' => 'Hidroponik', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Memulai Bisnis Bibit Tanaman', 'instructor' => 'Maya Puspita', 'duration' => '4,5 jam', 'image' => 'seed-business.svg', 'price' => 119000, 'category' => 'Bisnis Tani', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Budidaya Jamur Tiram Rumahan', 'instructor' => 'Agus Setiawan', 'duration' => '3,5 jam', 'image' => 'mushroom.svg', 'price' => 95000, 'category' => 'Budidaya', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Membuat Media Tanam Berkualitas', 'instructor' => 'Intan Lestari', 'duration' => '2 jam', 'image' => 'soil-mix.svg', 'price' => 55000, 'category' => 'Kompos', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kebun Herbal di Balkon', 'instructor' => 'Rani Kusuma', 'duration' => '2,5 jam', 'image' => 'herb-garden.svg', 'price' => 72000, 'category' => 'Urban Gardening', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Panen dan Pasca Panen untuk Pemula', 'instructor' => 'Yoga Pratama', 'duration' => '3 jam', 'image' => 'harvest.svg', 'price' => 79000, 'category' => 'Budidaya', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
