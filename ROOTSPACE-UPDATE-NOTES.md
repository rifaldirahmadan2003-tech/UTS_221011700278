# ROOTSPACE visual update

## Perubahan utama
- Hero section menggunakan foto urban gardening lokal dengan overlay gelap agar teks tetap terbaca.
- Kartu katalog menggunakan foto JPG lokal yang berbeda untuk setiap topik kelas.
- Kartu kelas memiliki efek hover, zoom gambar yang halus, border, dan shadow.
- Navigasi tetap sticky dan halaman memakai scroll yang halus.
- Tampilan katalog dan halaman detail menggunakan path gambar yang konsisten.
- Seeder diperbarui agar memakai nama file JPG baru.

## Menjalankan project
1. Pastikan PHP, Composer, Node.js, dan npm sudah tersedia.
2. Salin `.env.example` menjadi `.env` jika file `.env` belum ada.
3. Jalankan `php artisan key:generate` bila APP_KEY belum diisi.
4. Jalankan migrasi dan seeder sesuai database yang dipakai: `php artisan migrate --seed`.
5. Jalankan `php artisan serve`.

Jika tabel `courses` sudah ada dan data lama sudah tersimpan, jalankan seeder hanya jika memang ingin memasukkan ulang katalog. Untuk mengganti data gambar lama tanpa menambah duplikat, perbarui kolom `image` sesuai nama file JPG di `public/images/courses/`.
