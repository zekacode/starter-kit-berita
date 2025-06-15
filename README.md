=# Laravel News Portal - Starter Kit

Proyek ini adalah sebuah *Starter Kit* atau *Boilerplate* yang dibangun menggunakan **Laravel 11** dan **AdminLTE 3**. Tujuannya adalah untuk menyediakan fondasi yang kokoh dan siap pakai untuk membangun aplikasi web berbasis portal berita, blog, atau sistem manajemen konten (CMS) lainnya.

Starter kit ini sudah dilengkapi dengan sistem otentikasi, manajemen role user, alur kerja pembuatan konten dari wartawan hingga persetujuan editor, serta tema kustom yang elegan.

## ✨ Fitur Utama

-   ✅ **Otentikasi Lengkap:** Sistem Sign In, Register, Lupa Password, Reset Password, dan Edit Profil pengguna sudah siap pakai (disediakan oleh Laravel Breeze).
-   ✅ **Manajemen Role & Permission:** Terdapat 3 level akses pengguna yang sudah dikonfigurasi menggunakan `spatie/laravel-permission`:
    -   **Admin:** Memiliki akses penuh, termasuk mengelola kategori.
    -   **Editor:** Bertugas mereview dan mempublikasikan berita.
    -   **Wartawan:** Bertugas menulis dan mengirimkan berita.
-   ✅ **CRUD Kategori:** Admin dapat mengelola kategori berita (Tambah, Edit, Hapus).
-   ✅ **CRUD Berita (oleh Wartawan):**
    -   Form untuk menulis berita dengan Judul, Konten, dan pilihan Kategori.
    -   Fitur unggah gambar unggulan (feature image).
    -   Pengirim berita otomatis tercatat sesuai user yang login.
    -   Berita yang baru dibuat otomatis berstatus **`draft`**.
-   ✅ **Alur Kerja Approval (oleh Editor):**
    -   Halaman khusus untuk Editor melihat daftar berita yang berstatus `draft`.
    -   Editor dapat **menyetujui** (mengubah status menjadi `published`) atau **menolak** (mengubah status menjadi `rejected`) berita.
-   ✅ **Tema Kustom:** Tampilan AdminLTE sudah dimodifikasi dengan:
    -   **Palet Warna:** Kombinasi *Off-White, Dark Blue, Medium Blue,* dan *Terracotta Brown*.
    -   **Tipografi:** Menggunakan font **Lora** untuk judul dan **Montserrat** untuk teks UI.

## 🛠️ Teknologi yang Digunakan

-   **Backend:** PHP 8.2+, Laravel 11
-   **Frontend:** AdminLTE 3, Blade Template Engine, Bootstrap 4
-   **Database:** MySQL / MariaDB
-   **Otentikasi & Role:** Laravel Breeze, Spatie/laravel-permission
-   **Tools:** Composer, NPM, Vite

## 📸 Tangkapan Layar (Demo Aplikasi)

*(Catatan: Ganti `URL_SCREENSHOT_...` dengan path ke gambar tangkapan layar Anda setelah Anda mengunggahnya ke repository)*

### Halaman Login
![Halaman Login](URL_SCREENSHOT_LOGIN.png)

### Dashboard Utama
![Dashboard Utama](URL_SCREENSHOT_DASHBOARD.png)

### Manajemen Kategori (Admin)
![Manajemen Kategori](URL_SCREENSHOT_KATEGORI.png)

### Manajemen Berita (Wartawan)
![Manajemen Berita](URL_SCREENSHOT_BERITA_WARTAWAN.png)

### Halaman Approval Berita (Editor)
![Halaman Approval](URL_SCREENSHOT_APPROVAL_EDITOR.png)


## 🚀 Instalasi & Konfigurasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username/nama-repository.git
    cd nama-repository
    ```

2.  **Install Dependensi**
    Pastikan Anda memiliki Composer dan NPM terinstall.
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```
    Buat database baru (misal: `starter_kit_berita`) lalu sesuaikan konfigurasi database di file `.env` Anda.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=starter_kit_berita
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat semua tabel database dan mengisi tabel `roles` (Admin, Editor, Wartawan).
    ```bash
    php artisan migrate --seed
    ```

6.  **Buat Storage Link**
    Perintah ini penting agar gambar yang diunggah dapat diakses dari web.
    ```bash
    php artisan storage:link
    ```

7.  **Kompilasi Aset Frontend**
    ```bash
    npm run dev
    ```

8.  **Jalankan Server Development**
    ```bash
    php artisan serve
    ```
    Aplikasi sekarang dapat diakses di `http://127.0.0.1:8000`.

## 🧑‍💻 Setup User Roles Awal

Setelah registrasi user baru, Anda perlu memberikan role secara manual melalui terminal menggunakan command yang telah kita buat.

1.  Daftarkan 3 user baru melalui halaman register aplikasi.
2.  Gunakan command berikut di terminal untuk memberikan role:

    ```bash
    # Memberikan role Admin
    php artisan user:assign-role email.admin@example.com Admin

    # Memberikan role Editor
    php artisan user:assign-role email.editor@example.com Editor

    # Memberikan role Wartawan
    php artisan user:assign-role email.wartawan@example.com Wartawan
    ```

## 👨‍🎓 Author

-   **Nama:** Putrawin Adha Muzakki
-   **NIM:** 23091397181
-   **Kelas:** 2023F