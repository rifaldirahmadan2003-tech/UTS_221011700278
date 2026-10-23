<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $courses = [
            [
                'title' => 'Dasar Hidroponik untuk Pemula',
                'instructor' => 'Dimas Prakoso',
                'duration' => '3 jam',
                'image' => 'hidroponik.png',
                'price' => 79000,
                'category' => 'Hidroponik',
            ],
            [
                'title' => 'Merancang Kebun di Lahan Sempit',
                'instructor' => 'Nadia Wulandari',
                'duration' => '2,5 jam',
                'image' => 'merancang_kebun.png',
                'price' => 69000,
                'category' => 'Urban Gardening',
            ],
            [
                'title' => 'Membuat Kompos dari Sampah Dapur',
                'instructor' => 'Raka Firmansyah',
                'duration' => '2 jam',
                'image' => 'kompos.jpg',
                'price' => 59000,
                'category' => 'Kompos',
            ],
            [
                'title' => 'Budidaya Microgreens di Rumah',
                'instructor' => 'Sinta Maharani',
                'duration' => '3,5 jam',
                'image' => 'budidaya.jpg',
                'price' => 89000,
                'category' => 'Budidaya',
            ],
            [
                'title' => 'Menanam Sayuran Organik',
                'instructor' => 'Budi Santoso',
                'duration' => '4 jam',
                'image' => 'organik.png',
                'price' => 99000,
                'category' => 'Budidaya',
            ],
            [
                'title' => 'Perawatan Tanaman Hias Indoor',
                'instructor' => 'Alya Permata',
                'duration' => '2 jam',
                'image' => 'tanaman_hias.png',
                'price' => 65000,
                'category' => 'Tanaman Hias',
            ],
            [
                'title' => 'Sistem Irigasi Tetes Sederhana',
                'instructor' => 'Fajar Nugroho',
                'duration' => '3 jam',
                'image' => 'irigasi.png',
                'price' => 85000,
                'category' => 'Hidroponik',
            ],
            [
                'title' => 'Memulai Bisnis Bibit Tanaman',
                'instructor' => 'Maya Puspita',
                'duration' => '4,5 jam',
                'image' => 'pembibitan.png',
                'price' => 119000,
                'category' => 'Bisnis Tani',
            ],
            [
                'title' => 'Budidaya Jamur Tiram Rumahan',
                'instructor' => 'Agus Setiawan',
                'duration' => '3,5 jam',
                'image' => 'jamur.jpg',
                'price' => 95000,
                'category' => 'Budidaya',
            ],
            [
                'title' => 'Membuat Media Tanam Berkualitas',
                'instructor' => 'Intan Lestari',
                'duration' => '2 jam',
                'image' => 'kompos.jpg',
                'price' => 55000,
                'category' => 'Kompos',
            ],
            [
                'title' => 'Kebun Herbal di Balkon',
                'instructor' => 'Rani Kusuma',
                'duration' => '2,5 jam',
                'image' => 'kebun_vertikal.png',
                'price' => 72000,
                'category' => 'Urban Gardening',
            ],
            [
                'title' => 'Panen dan Pasca Panen untuk Pemula',
                'instructor' => 'Yoga Pratama',
                'duration' => '3 jam',
                'image' => 'akuaponik.png',
                'price' => 79000,
                'category' => 'Budidaya',
            ],
        ];

        foreach ($courses as &$course) {
            $course['created_at'] = $now;
            $course['updated_at'] = $now;
        }
        unset($course);

        foreach ($courses as $course) {
            DB::table('courses')->updateOrInsert(
                ['title' => $course['title']],
                $course
            );
        }
    }
}
