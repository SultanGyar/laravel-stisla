<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjadwalan;
use App\Models\Peralatan;
use App\Models\PointCheck;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PenjadwalanController extends Controller
{
    public function index()
    {
        $penjadwalan = Penjadwalan::all();
        return view('penjadwalan.index', [
            'penjadwalan' => $penjadwalan
        ]);
    }

    public function create()
    {
        $peralatan = Peralatan::all();
        $pointCheck = PointCheck::all();
        $idPenjadwalan = $this->generateIdPenjadwalan();
        return view('penjadwalan.create', [
            'peralatan' => $peralatan,
            'pointCheck' => $pointCheck,
            'idPenjadwalan' => $idPenjadwalan
        ]);
    }

    public function generateIdPenjadwalan()
    {
        $latestPenjadwalan = Penjadwalan::latest('id_penjadwalan')->first();

        if (!$latestPenjadwalan) {
            return 'PJ0001'; // Jika tidak ada data perbaikan, mulai dari DP001
        }

        $latestId = preg_replace('/[^0-9]/', '', $latestPenjadwalan->id_penjadwalan); // Mengambil angka dari ID terakhir
        $newId = intval($latestId) + 1; // Menambah 1 ke angka terakhir
        $newIdString = str_pad($newId, 4, '0', STR_PAD_LEFT); // Format ulang angka menjadi 3 digit dengan leading zero

        return 'PJ' . $newIdString; // Mengembalikan nilai ID Perbaikan yang baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penjadwalan' => 'required|unique:penjadwalan,id_penjadwalan|max:255',
            'tanggal' => 'required|date',
            'nama_alat' => 'required|max:255',
            'id_nama_alat' => 'required',
            'id_point_check' => 'required',
            'ruangan' => 'required|max:255',
            'tanggal_jadwal' => 'required|date',
        ]);

        $idPenjadwalan = $this->generateIdPenjadwalan();

        Penjadwalan::create(array_merge($request->all(), ['id_penjadwalan' => $idPenjadwalan]));

        return redirect()->route('penjadwalan.index')
            ->with('success', 'Jadwal created successfully.');
    }

    public function show($id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);
        return view('penjadwalan.show', ['penjadwalan' => $penjadwalan]);
    }


    public function edit($id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);
        $peralatan = Peralatan::all();
        $pointCheck = PointCheck::all();
        return view('penjadwalan.edit', [
            'penjadwalan' => $penjadwalan,
            'peralatan' => $peralatan,
            'pointCheck' => $pointCheck
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_penjadwalan' => 'required|max:255|unique:penjadwalan,id_penjadwalan,' . $id,
            'tanggal' => 'required|date',
            'nama_alat' => 'required|max:255',
            'id_nama_alat' => 'required',
            'id_point_check' => 'required',
            'ruangan' => 'required|max:255',
            'tanggal_jadwal' => 'required|date',
        ]);

        $penjadwalan = Penjadwalan::findOrFail($id);
        $penjadwalan->update($request->all());

        return redirect()->route('penjadwalan.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penjadwalan = Penjadwalan::findOrFail($id);
        $penjadwalan->delete();

        return redirect()->route('penjadwalan.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }

    public function cetakPdfPenjadwalan(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        // Ambil tanggal awal dan akhir dari input form
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Filter data berdasarkan rentang tanggal
        $penjadwalan = Penjadwalan::whereBetween('tanggal', [$startDate, $endDate])->get();

        // Load view dengan data yang sudah difilter
        $pdf = FacadePdf::loadView('penjadwalan.cetakpdfpenjadwalan', [
            'penjadwalan' => $penjadwalan,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);

        // Download PDF
        return $pdf->download('penjadwalan.pdf');
    }
}
