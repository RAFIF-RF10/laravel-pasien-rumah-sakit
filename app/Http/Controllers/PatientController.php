<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all(); // Ambil semua data pasien
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create'); // Tampilkan halaman form tambah pasien
    }

    public function store(Request $request)
    {
        // Validasi dan Simpan Data Pasien
        $request->validate([
            'name' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'gender' => 'required|in:male,female', // Menggunakan nilai enum yang sesuai
            'disease' => 'required|string|max:255',
            'doctor' => 'nullable|string|max:255',
            'status' => 'required|in:in-treatment,discharged', // Sesuaikan dengan nilai status
            'age' => 'required|integer|min:1', // Validasi umur (age)
        ]);

        // Simpan data pasien ke database
        Patient::create([
            'name' => $request->input('name'),
            'room' => $request->input('room'),
            'gender' => $request->input('gender'),
            'disease' => $request->input('disease'),
            'doctor' => $request->input('doctor'),
            'status' => $request->input('status'),
            'age' => $request->input('age'),  // Menyimpan umur
        ]);

        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id); // Cari pasien berdasarkan ID
        return view('patients.edit', compact('patient'));
    }

    // app/Http/Controllers/PatientController.php

    public function update(Request $request, $id)
{
    // Validasi data yang diterima
    $request->validate([
        'name' => 'required|string|max:255',
        'room' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'disease' => 'required|string|max:255',
        'doctor' => 'nullable|string|max:255',
        'status' => 'required|in:Masih Dirawat,Sudah Pulang', // Pastikan validasi status dengan bahasa Indonesia
    ]);

    // Ambil data pasien berdasarkan ID
    $patient = Patient::findOrFail($id);

    // Menyesuaikan status yang dikirimkan dengan yang ada di database
    $status = $request->input('status');
    $status = $status == 'Masih Dirawat' ? 'in-treatment' : 'discharged'; // Ganti status sesuai dengan yang ada di database

    // Update data pasien
    $patient->update([
        'name' => $request->input('name'),
        'room' => $request->input('room'),
        'gender' => $request->input('gender'),
        'disease' => $request->input('disease'),
        'doctor' => $request->input('doctor'),
        'status' => $status, // Pastikan status yang benar dimasukkan
    ]);

    // Redirect kembali ke halaman pasien
    return redirect()->route('patients.index')->with('success', 'Data pasien berhasil diperbarui!');
}


    public function destroy($id)
    {
        $patient = Patient::findOrFail($id); // Cari pasien berdasarkan ID
        $patient->delete(); // Hapus pasien
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}
