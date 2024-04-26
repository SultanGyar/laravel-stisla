<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perbaikan;
use App\Models\User;
use App\Models\Peralatan;

class PerbaikanController extends Controller
{
    public function index()
    {
        $perbaikan = Perbaikan::all();
        return view('perbaikan.index', [
            'perbaikan' => $perbaikan
        ]);
    }

    public function create()
    {
        $users = User::all();
        $peralatan = Peralatan::all();
        $idPerbaikan = $this->generateIdPerbaikan(); // Mendapatkan ID Perbaikan baru
        return view('perbaikan.create', [
            'peralatan' => $peralatan,
            'users' => $users,
            'idPerbaikan' => $idPerbaikan, // Mengirimkan nilai ID Perbaikan ke view
        ]);
    }


    public function generateIdPerbaikan()
    {
        $latestPerbaikan = Perbaikan::latest('id_perbaikan')->first();

        if (!$latestPerbaikan) {
            return 'PB0001'; // Jika tidak ada data perbaikan, mulai dari DP001
        }

        $latestId = preg_replace('/[^0-9]/', '', $latestPerbaikan->id_perbaikan); // Mengambil angka dari ID terakhir
        $newId = intval($latestId) + 1; // Menambah 1 ke angka terakhir
        $newIdString = str_pad($newId, 4, '0', STR_PAD_LEFT); // Format ulang angka menjadi 3 digit dengan leading zero

        return 'PB' . $newIdString; // Mengembalikan nilai ID Perbaikan yang baru
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'tanggal' => 'required|date',
            'nama_alat' => 'required|max:255',
            'id_alat_form' => 'required',
            'nama_pelapor' => 'required|max:255',
            'kelas' => 'required|max:255',
            'keterangan' => 'required',
        ]);

        $idPerbaikan = $this->generateIdPerbaikan(); // Menggunakan fungsi generateIdPerbaikan() untuk mendapatkan ID baru

        Perbaikan::create(array_merge($request->all(), ['id_perbaikan' => $idPerbaikan])); // Menambahkan ID baru ke data yang akan disimpan

        return redirect()->route('perbaikan.index')
            ->with('success', 'Rekaman perbaikan berhasil dibuat.');
    }


    public function edit($id)
    {
        $perbaikan = Perbaikan::findOrFail($id);
        $users = User::all();
        $peralatan = Peralatan::all();
        return view('perbaikan.edit', [
            'perbaikan' => $perbaikan,
            'users' => $users,
            'peralatan' => $peralatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_perbaikan' => 'required|max:255|unique:perbaikan,id_perbaikan,' . $id,
            'id_user' => 'required',
            'tanggal' => 'required|date',
            'nama_alat' => 'required|max:255',
            'id_alat_form' => 'required',
            'nama_pelapor' => 'required|max:255',
            'kelas' => 'required|max:255',
            'keterangan' => 'required',
        ]);

        $perbaikan = Perbaikan::findOrFail($id);
        $perbaikan->update($request->all());

        return redirect()->route('perbaikan.index')
            ->with('success', 'Rekaman perbaikan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perbaikan = Perbaikan::findOrFail($id);
        $perbaikan->delete();

        return redirect()->route('perbaikan.index')
            ->with('success', 'Rekaman perbaikan berhasil dihapus.');
    }
}
