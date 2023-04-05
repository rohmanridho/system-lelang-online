# Sistem Lelang Online
Ini adalah aplikasi web yang memungkinkan pengguna untuk mengikuti lelang secara online. Pengguna dapat membuat akun, mengikuti lelang/ menawar dan pengelolaan lelang.

## Fitur
Aplikasi ini memiliki beberapa fitur utama:

- Pendaftaran akun pengguna: Pengguna dapat mendaftar akun baru dengan mengisi formulir pendaftaran yang disediakan. Mereka juga dapat masuk ke akun yang sudah ada.
- Penampilan lelang: Pengguna dapat melihat daftar lelang yang tersedia dengan informasi detail seperti nama lelang, deskripsi, harga awal, dan daftar penawar lelang.
- Mengikuti lelang/ Menawar: Pengguna yang mengikuti lelang dapat menawar dengan menekan tombol "Tawar" dan memasukkan harga penawaran mereka. Sistem akan memvalidasi penawaran dan memperbarui harga tertinggi jika penawaran valid.
- Pengelolaan lelang: Pengguna dapat melihat lelang yang mereka ikuti di halaman history mereka dan mengelola lelang tersebut, seperti menarik diri dari lelang atau membatalkan penawaran dari daftar penawaran lelang.

## Teknologi yang Digunakan
Aplikasi ini dibangun menggunakan teknologi berikut:

- Bahasa pemrograman: PHP
- Framework web: Laravel
- Basis data: MySQL
- Front-end: TailwindCSS

## Cara Menjalankan Aplikasi
Berikut adalah langkah-langkah untuk menjalankan aplikasi ini di lingkungan pengembangan:

1. Pastikan Anda telah menginstal Node.js, Git, Composer, XAMPP.
2. Clone repositori ini ke dalam direktori lokal Anda.
3. Masuk ke direktori aplikasi dengan menjalankan perintah cd nama_direktori.
4. Install dependensi aplikasi dengan menjalankan perintah npm install atau yarn install dan composer install.
5. Konfigurasi file (.env) dengan mengganti nilai-nilai yang diperlukan, seperti koneksi basis data.
6. Jalankan migration dengan perintah php artisan migrate.
7. Jalankan aplikasi dengan perintah npm run dev dan php artisan serve.
8. Buka browser dan akses aplikasi di http://localhost:8000
9. Aplikasi sekarang sudah berjalan di lingkungan pengembangan lokal Anda. Anda dapat mengakses berbagai fitur aplikasi, seperti pendaftaran akun, melihat lelang yang tersedia, mengikuti lelang, menawar, dan mengelola lelang yang Anda ikuti.
10. Untuk menghentikan aplikasi, cukup tekan Ctrl + C di terminal untuk menghentikan server.