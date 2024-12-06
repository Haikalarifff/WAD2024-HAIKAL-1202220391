<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Tampilkan semua data dosen
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    // Tampilkan form tambah dosen
    public function create()
    {
        return view('dosens.create');
    }

    // Simpan data dosen baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_dosen' => 'required|unique:dosens,kode_dosen|max:3',
            'nama_dosen' => 'required|string|max:20',
            'nip' => 'required|unique:dosens,nip|max:50',
            'email' => 'required|unique:dosens,email|email',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        Dosen::create($request->all());
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    // Tampilkan detail dosen
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosens.show', compact('dosen'));
    }

    // Tampilkan form edit dosen
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosens.edit', compact('dosen'));
    }

    // Update data dosen
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_dosen' => 'required|unique:dosens,kode_dosen,' . $id . '|max:3',
            'nama_dosen' => 'required|string|max:20',
            'nip' => 'required|unique:dosens,nip,' . $id . '|max:50',
            'email' => 'required|unique:dosens,email,' . $id . '|email',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    // Hapus data dosen
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus.');
    }
}