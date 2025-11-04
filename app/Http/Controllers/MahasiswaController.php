<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "DB Facade aktif 🔥";
    }

    public function insertSql()
    {
        $result = DB::insert("
            INSERT INTO students (nim, nama, tanggal_lahir, ipk, created_at, updated_at)
            VALUES ('19003036','Sari Citra Lestari','2001-12-31',3.50,now(),now())
        ");
        dump($result);
    }

    public function insertBinding()
    {
        $result = DB::insert("
            INSERT INTO students (nim, nama, tanggal_lahir, ipk, created_at, updated_at)
            VALUES (:nim, :nama, :tgl, :ipk, :created, :updated)
        ", [
            'nim' => '19005011',
            'nama' => 'Riana Putria',
            'tgl' => '2000-11-23',
            'ipk' => 2.70,
            'created' => now(),
            'updated' => now(),
        ]);

        dump($result);
    }

    public function update()
    {
        $result = DB::update("
            UPDATE students SET ipk = 3.90, updated_at = now() WHERE nim = ?
        ", ['19003036']);

        dump($result);
    }

    public function delete()
    {
        $result = DB::delete("
            DELETE FROM students WHERE nim = ?
        ", ['19005011']);

        dump($result);
    }

    public function select()
    {
        $result = DB::select("SELECT * FROM students");
        dump($result);
    }

    public function selectView()
    {
        $result = DB::select("SELECT * FROM students");
        return view('universitas.data-mahasiswa', ['students' => $result]);
    }

    public function selectWhere()
    {
        $result = DB::select("
            SELECT * FROM students WHERE ipk > ? ORDER BY nama ASC
        ", [3]);
        return view('universitas.data-mahasiswa', ['students' => $result]);
    }

    public function statement()
    {
        DB::statement("TRUNCATE students");
        return "Tabel students sudah dikosongkan ✅";
    }

// MINI STUDY CASE 

public function indexQB()
{
    // ambil semua data (nim & nama saja)
    $students = DB::table('students')
        ->select('nim', 'nama')
        ->orderBy('nama', 'asc')
        ->get();

    return view('universitas.index-student', ['students' => $students]);
}

public function showQB($nim)
{
    // ambil data berdasarkan NIM
    $student = DB::table('students')
        ->where('nim', $nim)
        ->first();

    // kalau data gak ketemu
    if (!$student) {
        return redirect('/student')->with('error', 'Data student tidak ditemukan.');
    }

    // tampilkan ke view detail
    return view('universitas.detail-student', ['student' => $student]);
}
}



