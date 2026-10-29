# Laravel Inventory Management System

Aplikasi web sederhana untuk mengelola data inventaris barang yang dibangun menggunakan Laravel dan MySQL.

Project ini dibuat sebagai portfolio untuk mempraktikkan pengembangan aplikasi web, pengelolaan database, operasi CRUD, dan validasi input menggunakan Laravel.

## Fitur

- Menampilkan daftar barang.
- Menambahkan data barang.
- Mengedit data barang.
- Menghapus data barang.
- Validasi input pada form tambah dan edit barang.
- Validasi kode barang agar tidak duplikat.
- Validasi stok dan harga agar sesuai dengan ketentuan.
- Menampilkan pesan keberhasilan setelah operasi berhasil dilakukan.
- Menampilkan pesan kesalahan ketika input tidak valid.

## Teknologi

- PHP 8.2
- Laravel 12
- MySQL
- HTML
- CSS
- Blade Template Engine
- XAMPP

## Tampilan Aplikasi

Screenshot aplikasi akan ditambahkan pada bagian ini.

## Persyaratan

Pastikan perangkat sudah memiliki:

- PHP 8.2 atau versi yang kompatibel.
- Composer.
- MySQL atau MariaDB.
- Git.
- Web server lokal, seperti XAMPP.

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone URL_REPOSITORY_KAMU
```

Ganti `URL_REPOSITORY_KAMU` dengan URL repository GitHub milikmu.

### 2. Masuk ke Folder Project

```bash
cd inventory-management
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Buat File Environment

Salin file `.env.example` menjadi `.env`, kemudian sesuaikan konfigurasi database.

Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_management
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi MySQL di perangkatmu.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Buat Database

Buat database dengan nama `inventory_management` melalui phpMyAdmin atau MySQL.

### 7. Jalankan Migration

```bash
php artisan migrate
```

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

Buka alamat berikut di browser:

http://127.0.0.1:8000/barang

## Catatan

Project ini merupakan aplikasi portfolio untuk mempraktikkan dasar pengembangan aplikasi web menggunakan Laravel. Fitur yang tersedia berfokus pada pengelolaan data inventaris barang dan validasi input.

## Author

Sifaul Hikmah