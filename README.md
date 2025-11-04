<p align="center"><a href="https://www.instagram.com/fathifathan_/" target="_blank"><img src="public/img/logo.png" width="300" alt="uag Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Week 07 Running Task Update - Web Framework (Laravel)

## Student Information
- **Name** : Fathi Fathan Fathurrahman Nuryadin
- **NIM**  : 2310130005

## Description
This repository contains assignments for the Web Framework class.
The assignment is to replace the native PHP views with Laravel Blade templates,
and implement all routes with the appropriate views.
Bootstrap is used for the front-end design.

##  Fitur yang Baru Ditambahkan

###  1. MahasiswaController
File: `app/Http/Controllers/MahasiswaController.php`  
Menangani seluruh proses pengambilan dan penampilan data mahasiswa.

**Fungsi utama:**
- `selectView()` → menampilkan semua data mahasiswa (`students`)
- `selectWhere()` → menampilkan data mahasiswa dengan IPK > 3
- `indexQB()` → menampilkan daftar mahasiswa (Week 8)
- `showQB($nim)` → menampilkan detail mahasiswa berdasarkan NIM

Controller ini menggunakan **DB Facade** dan **Query Builder** untuk berinteraksi dengan tabel `students`.

---

###  2. Migration — `create_students_table.php`
File: `database/migrations/xxxx_xx_xx_xxxxxx_create_students_table.php`

Membuat tabel `students` dengan struktur:

| Kolom | Tipe Data | Keterangan |
|-------|------------|------------|
| `id` | bigint (auto increment) | Primary Key |
| `nim` | char(8) | Nomor Induk Mahasiswa |
| `nama` | varchar | Nama lengkap mahasiswa |
| `tanggal_lahir` | date | Tanggal lahir |
| `ipk` | decimal(3,2) | Indeks Prestasi Kumulatif |
| `created_at` / `updated_at` | timestamp | Otomatis diisi oleh Laravel |

---

###  3. Views (Tampilan)

####  `resources/views/data-mahasiswa.blade.php`
Menampilkan daftar mahasiswa (Week 7 – DB Facade).  
Digunakan oleh fungsi `selectView()` dan `selectWhere()`.

####  `resources/views/universitas/index-student.blade.php`
Menampilkan daftar mahasiswa (Week 8 – Query Builder).  
Setiap nama mahasiswa dapat diklik untuk melihat detailnya.

####  `resources/views/universitas/detail-student.blade.php`
Menampilkan detail satu mahasiswa berdasarkan NIM.  
Ditampilkan ketika user mengklik nama mahasiswa dari halaman index.

---

### 4. Routes
File: `routes/web.php`

Route baru yang ditambahkan:

```php```
Route::get('/student', [MahasiswaController::class, 'indexQB']);
Route::get('/student/{nim}', [MahasiswaController::class, 'showQB']); 

---

## How to Run
1. Clone this repository  
   ```bash
   git clone <repo-url>

---

## About Vendor

vendor cannot be uploaded on github so you have to install vendor yourself at https://getcomposer.org/download/ to be able to run your laravel project
