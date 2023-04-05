# Sistem Lelang Online
Ini adalah aplikasi web yang memungkinkan pengguna untuk mengikuti dan mengikuti lelang secara online. Pengguna dapat membuat akun, mengikuti lelang, menawar, dan mengelola lelang yang mereka ikuti.

## Fitur
Aplikasi ini memiliki beberapa fitur utama:

- Pendaftaran akun pengguna: Pengguna dapat mendaftar akun baru dengan mengisi formulir pendaftaran yang disediakan. Mereka juga dapat masuk ke akun yang sudah ada.
Penampilan lelang: Pengguna dapat melihat daftar lelang yang tersedia dengan informasi detail seperti nama lelang, deskripsi, harga awal, dan waktu lelang berakhir.
- Mengikuti lelang: Pengguna dapat mengikuti lelang dengan menekan tombol "Ikuti" di halaman lelang. Mereka akan menerima pemberitahuan tentang perubahan status lelang yang mereka ikuti.
- Menawar: Pengguna yang mengikuti lelang dapat menawar dengan menekan tombol "Tawar" dan memasukkan harga penawaran mereka. Sistem akan memvalidasi penawaran dan memperbarui harga tertinggi jika penawaran valid.
- Pengelolaan lelang: Pengguna dapat melihat lelang yang mereka ikuti di halaman profil mereka dan mengelola lelang tersebut, seperti menarik diri dari lelang atau menghapus lelang dari daftar mereka.
- Pemberitahuan: Pengguna akan menerima pemberitahuan melalui email atau pemberitahuan dalam aplikasi tentang perubahan status lelang yang mereka ikuti, seperti penawaran baru atau lelang berakhir.

## Teknologi yang Digunakan
Aplikasi ini dibangun menggunakan teknologi berikut:

- Bahasa pemrograman: PHP
- Framework web: Laravel
- Basis data: MySQL
- Front-end: TailwindCSS

## Cara Menjalankan Aplikasi
Berikut adalah langkah-langkah untuk menjalankan aplikasi ini di lingkungan pengembangan:

1. Pastikan Anda telah menginstal [prasyarat yang diperlukan, misalnya Node.js dan MongoDB].
2. Clone repositori ini ke dalam direktori lokal Anda.
3. Masuk ke direktori aplikasi dengan menjalankan perintah cd nama_direktori.
4. Install dependensi aplikasi dengan menjalankan perintah npm install atau yarn install.
5. Konfigurasi file lingkungan (env) dengan mengganti nilai-nilai yang diperlukan, seperti koneksi basis data atau pengaturan autentikasi.
6. Jalankan aplikasi dengan perintah npm start atau yarn start.
7. Buka browser dan akses aplikasi di [http://localhost:3000]
8. Aplikasi sekarang sudah berjalan di lingkungan pengembangan lokal Anda. Anda dapat mengakses berbagai fitur aplikasi, seperti pendaftaran akun, melihat lelang yang tersedia, mengikuti lelang, menawar, dan mengelola lelang yang Anda ikuti.
9. Untuk menghentikan aplikasi, cukup tekan Ctrl + C di terminal untuk menghentikan server.