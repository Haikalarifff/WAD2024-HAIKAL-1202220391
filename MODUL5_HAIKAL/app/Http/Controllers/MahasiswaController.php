<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Tampilkan semua data mahasiswa
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get(); // Relasi ke dosen
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    // Tampilkan form tambah mahasiswa
    public function create()
    {
        $dosens = Dosen::all(); // Ambil data dosen untuk dropdown
        return view('mahasiswas.create', compact('dosens'));
    }

    // Simpan data mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|max:15',
            'nama_mahasiswa' => 'required|string|max:20',
            'email' => 'required|unique:mahasiswas,email|email',
            'jurusan' => 'required|string|max:100',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // Tampilkan detail mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($id); // Relasi ke dosen
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    // Tampilkan form edit mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all(); // Ambil data dosen untuk dropdown
        return view('mahasiswas.edit', compact('mahasiswa', 'dosens'));
    }

    // Update data mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id . '|max:15',
            'nama_mahasiswa' => 'required|string|max:20',
            'email' => 'required|unique:mahasiswas,email,' . $id . '|email',
            'jurusan' => 'required|string|max:100',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    // Hapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}