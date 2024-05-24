# Lara-Toolshop

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

[![Generic badge](https://img.shields.io/badge/YOSI_RIFAI_PUTRA-LARAVEL_11__MYSQL_DATABASE_-<COLOR>.svg)](https://shields.io/)
```
Proyek ini adalah sebuah aplikasi Laravel untuk mengelola toko alat dengan fitur autentikasi, verifikasi email, dashboard dinamis, dan manajemen barang.

## Fitur

- **Login Auth dengan Verifikasi Email**: Pengguna dapat melakukan registrasi, login, dan verifikasi email.
- **Dashboard Dinamis**: Menampilkan statistik data barang.
- **Kelola Kategori**: CRUD untuk kategori barang.
- **Kelola Item/Barang**: CRUD untuk barang.
- **Kelola Satuan Barang/Item Unit**: CRUD untuk satuan barang.
- **Chat** (masih dalam perbaikan): Fitur untuk melakukan percakapan secara real-time.
- **Kelola Profil**: Pengguna dapat mengubah profil mereka.

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini di mesin lokal Anda.

1. Clone Repository ini
   ```bash
   git clone https://github.com/yosiRifai/laravel_toolshop.git
   ```
2. Masuk ke Directory aplikasi
    ```bash
    cd lara-toolshop
    ```
3. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```
4. Salin file .env.example menjadi .env dan sesuaikan konfigurasi database:
    ```bash
    cp .env.example .env
    ```
5. Atur konfigurasi database di file .env:
    ```makefile
    DB_DATABASE=lara-toolshop
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6. Generate aplikasi key:
    ```bash
        php artisan key:generate
    ```
7. Jalankan migrasi dan seeding:
    ```bash
    php artisan migrate --seed
    ```
8. Instal dependensi frontend menggunakan npm:
    ```bash
    npm install
    ```
9. Build aset frontend:
    ```bash
    npm run dev
    ```
10. Jalankan server lokal:
    ```bash
    php artisan serve
    ```
#   Penggunaan
Setelah instalasi, Anda dapat menggunakan informasi login berikut untuk mengakses aplikasi:
    Email: admin@admin.com
    Password: admin123
## Kontribusi
Panduan untuk berkontribusi pada proyek ini.

### Fork repository ini.
Buat branch fitur Anda (git checkout -b fitur/AmazingFeature).
Commit perubahan Anda (git commit -m 'Menambahkan fitur yang luar biasa').
Push ke branch (git push origin fitur/AmazingFeature).
Buat Pull Request.

# Fullstack Challenge
## FS 3.1 (Authentication & Profile)
Goals
-[x] User bisa melakukan registrasi menggunakan email.
-[x] User bisa login menggunakan email mereka.
-[x] User bisa mengubah profil mereka.
### Tasks
Buatlah tampilan form registrasi dan login sebaik-baiknya.
Buat fungsi registrasi supaya user bisa mendaftar dengan mencantumkan nama, email dan password. Ketika user berhasil mendaftarkan maka akan menerima email untuk melakukan verifikasi.
Buat fungsi dan tampilan untuk melakukan verifikasi email.
Setelah berhasil melakukan verifikasi email, user diarahkan ke halaman untuk melengkapi data diri, di dalamnya terdapat form berisikan foto profil, tgl lahir, no telp, alamat & pekerjaan (select box, data nya bebas).
Buat fungsi untuk user supaya bisa login menggunakan email mereka.
Ketika user sudah login arahkan user ke halaman profil. Di dalam halaman profil user bisa mengganti data diri mereka meliputi nama, email, password, foto profil, tgl lahir, no telp, alamat & pekerjaan.
# FS 3.2 (Admin Panel)
## Goals
-[x] User bisa menambahkan kategori barang
-[x] User bisa menambahkan barang
-[x] User bisa menambahkan satuan barang
-[x] User bisa mengubah status satuan barang
-[x] User bisa melihat dashboard berisikan statistik data barang
### Tasks
Buat CRUD untuk kategori barang (contoh kategori: meja, kursi).
Buat CRUD untuk barang yang di dalamnya berisikan nama barang, merk barang, dan kategori barang.
Di dalam barang, buat CRUD satuan barang dimana satuan ini memiliki kode barang (bersifat unik), dan juga status kondisi (bagus, rusak, perlu perbaikan & dalam perbaikan).
Di dashboard tampilkan 4 card yang masing-masing menampilkan angka total barang dari masing-masing status kondisi satuan barang.
Di dashboard tampilkan juga 4 pie chart dari masing-masing status kondisi satuan barang, berdasarkan total satuan barang, per kategori barang (contoh untuk status barang yang rusak menampilkan kalau terdapat 4 kursi, 6 meja, dan 2 papan tulis dalam bentuk pie chart).
# FS 3.3 (Realtime Chat)
## Goals
-[x] User bisa join dengan memasukkan username mereka
-[] User bisa membuat ruang chat
-[] User bisa join ruang chat
-[] User bisa mengirim pesan dan menerima pesan dari ruang chat
### Tasks
Buat socket server menggunakan socket.io.
Buat tampilan awal form untuk melakukan input username.
Buat Tampilan setelah input username, berisikan list ruang chat yang tersedia (realtime untuk list nya jika ada ruang chat baru dan juga realtime untuk pesan terakhir dari masing-masing ruang chat).
Buat fungsi dan tampilan membuat ruang chat dengan memasukkan nama ruang chat.
Ketika user join ruang chat, buat fungsi user bisa menerima dan mengirim pesan di ruang chat tersebut secara realtime.
# Catatan
Dikarenakan waktu saya yang berdempetan dengan kegiatan skripsi tugas akhir, saya tidak bisa memaksimalkan hasil pengerjaan pada jangka waktu yang diberikan. Saya akan lebih banyak belajar untuk dapat semakin mengembangkan ilmu yang saya dapatkan pada perkuliahan dan semoga aplikasi yang saya buat dapat memberikan penilain memuaskan untuk penilai terima kasih.
