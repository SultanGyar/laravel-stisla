<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peralatan;
use App\Models\KategoriPeralatan;

class PeralatanController extends Controller
{
    public function index()
    {
        $peralatan = Peralatan::all();
        return view('peralatan.index', [
            'peralatan' => $peralatan
        ]);
    }

    public function create()
    {
        $kategoriPeralatan = KategoriPeralatan::all();
        $idAlat = $this->generateIdAlat();
        return view('peralatan.create', [
            'kategoriPeralatan' => $kategoriPeralatan,
            'idAlat' => $idAlat
        ]);
    }

    public function generateIdAlat()
    {
        $latestAlat = Peralatan::latest('id_alat')->first();

        if (!$latestAlat) {
            return 'AL0001'; // Jika tidak ada data perbaikan, mulai dari DP001
        }

        $latestId = preg_replace('/[^0-9]/', '', $latestAlat->id_alat); // Mengambil angka dari ID terakhir
        $newId = intval($latestId) + 1; // Menambah 1 ke angka terakhir
        $newIdString = str_pad($newId, 4, '0', STR_PAD_LEFT); // Format ulang angka menjadi 3 digit dengan leading zero

        return 'AL' . $newIdString; // Mengembalikan nilai ID Perbaikan yang baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required|unique:peralatan|max:255',
            'nama_alat' => 'required',
            'id_kategori_alat' => 'required|exists:kategori_peralatan,id',
        ]);

        $idAlat = $this->generateIdAlat();

        Peralatan::create(array_merge($request->all(), ['id_alat' => $idAlat]));

        return redirect()->route('peralatan.index')
            ->with('success', 'Peralatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peralatan = Peralatan::findOrFail($id);
        $kategoriPeralatan = KategoriPeralatan::all();
        return view('peralatan.edit', [
            'peralatan' => $peralatan,
            'kategoriPeralatan' => $kategoriPeralatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alat' => 'required|max:255',
            'nama_alat' => 'required',
            'id_kategori_alat' => 'required|exists:kategori_peralatan,id',
        ]);

        $peralatan = Peralatan::findOrFail($id);
        $peralatan->update($request->all());

        return redirect()->route('peralatan.index')
            ->with('success', 'Peralatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peralatan = Peralatan::findOrFail($id);
        $peralatan->delete();

        return redirect()->route('peralatan.index')
            ->with('success', 'Peralatan berhasil dihapus.');
    }
}
