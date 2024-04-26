<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPeralatan;

class KategoriPeralatanController extends Controller
{
    public function index()
    {
        $kategoriPeralatan = KategoriPeralatan::all();
        return view('kategori_peralatan.index', [
            'kategoriPeralatan' => $kategoriPeralatan
        ]);
    }

    public function create()
    {
        return view('kategori_peralatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_alat' => 'required|unique:kategori_peralatan|max:255',
        ]);

        KategoriPeralatan::create($request->all());

        return redirect()->route('kategori_peralatan.index')
            ->with('success', 'Kategori peralatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategoriPeralatan = KategoriPeralatan::findOrFail($id);
        return view('kategori_peralatan.edit', [
            'kategoriPeralatan' => $kategoriPeralatan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_alat' => 'required|unique:kategori_peralatan,kategori_alat,'.$id.'|max:255',
        ]);

        $kategoriPeralatan = KategoriPeralatan::findOrFail($id);
        $kategoriPeralatan->update($request->all());

        return redirect()->route('kategori_peralatan.index')
            ->with('success', 'Kategori peralatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategoriPeralatan = KategoriPeralatan::findOrFail($id);
        $kategoriPeralatan->delete();

        return redirect()->route('kategori_peralatan.index')
            ->with('success', 'Kategori peralatan berhasil dihapus.');
    }
}
