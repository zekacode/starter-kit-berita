Laravel News Portal - Starter Kit

Proyek ini adalah sebuah Starter Kit atau Boilerplate yang dibangun menggunakan Laravel 11 dan AdminLTE 3. Tujuannya adalah untuk menyediakan fondasi yang kokoh dan siap pakai untuk membangun aplikasi web berbasis portal berita, blog, atau sistem manajemen konten (CMS) lainnya.

Starter kit ini sudah dilengkapi dengan sistem otentikasi, manajemen role user, alur kerja pembuatan konten dari wartawan hingga persetujuan editor, serta tema kustom yang elegan.

✨ Fitur Utama

✅ Otentikasi Lengkap: Sistem Sign In, Register, Lupa Password, Reset Password, dan Edit Profil pengguna sudah siap pakai (disediakan oleh Laravel Breeze).

✅ Manajemen Role & Permission: Terdapat 3 level akses pengguna yang sudah dikonfigurasi menggunakan spatie/laravel-permission:

Admin: Memiliki akses penuh, termasuk mengelola kategori.

Editor: Bertugas mereview dan mempublikasikan berita.

Wartawan: Bertugas menulis dan mengirimkan berita.

✅ CRUD Kategori: Admin dapat mengelola kategori berita (Tambah, Edit, Hapus).

✅ CRUD Berita (oleh Wartawan):

Form untuk menulis berita dengan Judul, Konten, dan pilihan Kategori.

Fitur unggah gambar unggulan (feature image).

Pengirim berita otomatis tercatat sesuai user yang login.

Berita yang baru dibuat otomatis berstatus draft.

✅ Alur Kerja Approval (oleh Editor):

Halaman khusus untuk Editor melihat daftar berita yang berstatus draft.

Editor dapat menyetujui (mengubah status menjadi published) atau menolak (mengubah status menjadi rejected) berita.

✅ Tema Kustom: Tampilan AdminLTE sudah dimodifikasi dengan:

Palet Warna: Kombinasi Off-White, Dark Blue, Medium Blue, dan Terracotta Brown.

Tipografi: Menggunakan font Lora untuk judul dan Montserrat untuk teks UI.

🛠️ Teknologi yang Digunakan

Backend: PHP 8.2+, Laravel 11

Frontend: AdminLTE 3, Blade Template Engine, Bootstrap 4

Database: MySQL / MariaDB

Otentikasi & Role: Laravel Breeze, Spatie/laravel-permission

Tools: Composer, NPM, Vite

📸 Tangkapan Layar (Demo Aplikasi)

(Catatan: Ganti URL_SCREENSHOT_... dengan path ke gambar tangkapan layar Anda setelah Anda mengunggahnya ke repository)

Halaman Login

![alt text](URL_SCREENSHOT_LOGIN.png)

Dashboard Utama

![alt text](URL_SCREENSHOT_DASHBOARD.png)

Manajemen Kategori (Admin)

![alt text](URL_SCREENSHOT_KATEGORI.png)

Manajemen Berita (Wartawan)

![alt text](URL_SCREENSHOT_BERITA_WARTAWAN.png)

Halaman Approval Berita (Editor)

![alt text](URL_SCREENSHOT_APPROVAL_EDITOR.png)

🚀 Instalasi & Konfigurasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

Clone Repository

git clone https://github.com/username/nama-repository.git
cd nama-repository


Install Dependensi
Pastikan Anda memiliki Composer dan NPM terinstall.

composer install
npm install
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Konfigurasi Environment
Salin file .env.example menjadi .env.

cp .env.example .env
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Buat database baru (misal: starter_kit_berita) lalu sesuaikan konfigurasi database di file .env Anda.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=starter_kit_berita
DB_USERNAME=root
DB_PASSWORD=
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Env
IGNORE_WHEN_COPYING_END

Generate Application Key

php artisan key:generate
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Jalankan Migrasi & Seeder
Perintah ini akan membuat semua tabel database dan mengisi tabel roles (Admin, Editor, Wartawan).

php artisan migrate --seed
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Buat Storage Link
Perintah ini penting agar gambar yang diunggah dapat diakses dari web.

php artisan storage:link
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Kompilasi Aset Frontend

npm run dev
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Jalankan Server Development

php artisan serve
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END

Aplikasi sekarang dapat diakses di http://127.0.0.1:8000.

🧑‍💻 Setup User Roles Awal

Setelah registrasi user baru, Anda perlu memberikan role secara manual melalui terminal menggunakan command yang telah kita buat.

Daftarkan 3 user baru melalui halaman register aplikasi.

Gunakan command berikut di terminal untuk memberikan role:

# Memberikan role Admin
php artisan user:assign-role email.admin@example.com Admin

# Memberikan role Editor
php artisan user:assign-role email.editor@example.com Editor

# Memberikan role Wartawan
php artisan user:assign-role email.wartawan@example.com Wartawan
IGNORE_WHEN_COPYING_START
content_copy
download
Use code with caution.
Bash
IGNORE_WHEN_COPYING_END
👨‍🎓 Author

Nama: Putrawin Adha Muzakki

NIM: 23091397181

Kelas: 2023F