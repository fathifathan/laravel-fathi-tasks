<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DaftarMahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Eloquent ORM aktif 🔥";
    }


    // ============================
    // INSERT DATA (ELOQUENT)
    // ============================

    public function insertSql()
    {
        $mhs = Mahasiswa::create([
            'nim'   => '19003036',
            'nama'  => 'Sari Citra Lestari',
            'tanggal_lahir' => '2001-12-31',
            'ipk'   => 3.50
        ]);

        dump($mhs);
    }

    public function insertBinding()
    {
        $mhs = Mahasiswa::create([
            'nim'   => '19005011',
            'nama'  => 'Riana Putria',
            'tanggal_lahir' => '2000-11-23',
            'ipk' => 2.70
        ]);

        dump($mhs);
    }


    // ============================
    // UPDATE DATA (ELOQUENT)
    // ============================

    public function update()
    {
        $mhs = Mahasiswa::where('nim', '19003036')->first();

        if (!$mhs) {
            return "Data tidak ditemukan";
        }

        $mhs->update(['ipk' => 3.90]);

        dump($mhs);
    }


    // ============================
    // DELETE DATA (SOFT DELETE)
    // ============================

    public function delete()
    {
        $mhs = Mahasiswa::where('nim', '19005011')->first();

        if (!$mhs) {
            return "Data tidak ditemukan";
        }

        $mhs->delete(); // soft delete

        return "Data berhasil dihapus (soft delete)";
    }


    // ============================
    // SELECT (ELOQUENT)
    // ============================

    public function select()
    {
        $result = Mahasiswa::all();
        dump($result);
    }


    public function selectView()
    {
        $students = Mahasiswa::all();
        return view('universitas.data-mahasiswa', compact('students'));
    }


    public function selectWhere()
    {
        $students = Mahasiswa::where('ipk', '>', 3)
            ->orderBy('nama', 'asc')
            ->get();

        return view('universitas.data-mahasiswa', compact('students'));
    }


    // ============================
    // TRUNCATE
    // ============================

    public function statement()
    {
        Mahasiswa::truncate();
        return "Tabel students sudah dikosongkan ✅";
    }


    // ============================
    // MINI STUDY CASE UNTUK VIEW
    // ============================

    public function indexQB()
    {
        $students = Mahasiswa::select('nim', 'nama')
            ->orderBy('nama', 'asc')
            ->get();

        return view('universitas.index-student', compact('students'));
    }

    public function showQB($nim)
    {
        $student = Mahasiswa::where('nim', $nim)->first();

        if (!$student) {
            return redirect('/student')->with('error', 'Data student tidak ditemukan.');
        }

        return view('universitas.detail-student', compact('student'));
    }


    // ============================
    // FORM PENDAFTARAN
    // ============================

    public function formPendaftaran()
    {
        return view('form-pendaftaran');
    }


    public function prosesForm(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8',
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => 'nullable',
        ]);

        Mahasiswa::create($validateData);

        return redirect('/form')->with('success', 'Data mahasiswa berhasil didaftarkan!');
    }


    // VALIDATOR MANUAL
    public function prosesFormValidator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|size:8',
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
        ], [
            'required' => ':attribute wajib diisi.',
            'email' => 'Format :attribute tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect('/form')->withErrors($validator)->withInput();
        }

        dump($request->all());
    }


    // FORM REQUEST (DaftarMahasiswa.php)
    public function prosesFormRequest(DaftarMahasiswa $request)
    {
        $validateData = $request->validated();

        // PROSES UPLOAD FOTO
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $namaFile);

            // simpan nama file ke array data
            $validateData['foto'] = $namaFile;
        }

        Mahasiswa::create($validateData);

        return redirect('/form')->with(
            'success',
            "Pendaftaran berhasil dan foto berhasil diupload "
        );
    }

}
