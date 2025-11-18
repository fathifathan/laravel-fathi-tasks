<p align="center"><a href="https://www.instagram.com/fathifathan_/" target="_blank"><img src="public/img/logo.png" width="300" alt="uag Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Week 08 Running Task Update - Web Framework (Laravel)

## Student Information
- **Name** : Fathi Fathan Fathurrahman Nuryadin
- **NIM**  : 2310130005

## Description
This repository contains assignments for the Web Framework class.
The assignment is to replace the native PHP views with Laravel Blade templates,
and implement all routes with the appropriate views.
Bootstrap is used for the front-end design.

##  Fitur yang Baru Ditambahkan

## 1. Mahasiswa Model (Eloquent ORM + Soft Delete)
File: `app/Models/Mahasiswa.php`

Model ini menggantikan seluruh operasi database manual sebelumnya.

### Fitur pada Model:
- Menggunakan **Eloquent ORM**
- Mengaktifkan **Soft Deletes**
- Menentukan `$fillable` untuk mass assignment
- Mengarah ke tabel `students`

### Cuplikan kode:
```php```
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $table = 'students';

    protected $fillable = [
        'nim', 'nama', 'email', 'tanggal_lahir', 'ipk',
        'jenis_kelamin', 'jurusan', 'alamat'
    ];
}

---

###  2. MahasiswaController (Eloquent CRUD)
File: `app/Http/Controllers/MahasiswaController.php`

Seluruh operasi CRUD kini menggunakan Eloquent ORM, bukan lagi DB Facade.

Fitur Utama:
- Mahasiswa::create() → tambah data
- $mhs->update() → update data
- $mhs->delete() → soft delete
- Mahasiswa::all() → mengambil semua data
- where() dan orderBy() → filter dan sorting
- Validasi menggunakan Form Request

---

###  3. Migration — Soft Delete Support
File: `database/migrations/xxxx_xx_xx_create_students_table.php`
telah ditambahkan: `$table->softDeletes();`

####  `resources/views/data-mahasiswa.blade.php`
Menampilkan daftar mahasiswa (Week 8 – DB Facade).  
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
### documentaion
<img width="1463" height="391" alt="Cuplikan layar 2025-11-18 133026" src="https://github.com/user-attachments/assets/c541beb7-715b-48b1-825c-c917627f8f43" />
<img width="723" height="844" alt="image" src="https://github.com/user-attachments/assets/e277954e-20ee-4152-988a-d526114ed584" />


---

## How to Run
1. Clone this repository  
   ```bash
   git clone <repo-url>

---

## About Vendor

vendor cannot be uploaded on github so you have to install vendor yourself at https://getcomposer.org/download/ to be able to run your laravel project
