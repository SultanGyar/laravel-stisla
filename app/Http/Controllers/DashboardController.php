<?php

namespace App\Http\Controllers;

use App\Models\Penjadwalan;
use App\Models\Peralatan;
use App\Models\Perbaikan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $peralatanCount = Peralatan::count();
        $penjadwalanCount = Penjadwalan::count();
        $perbaikanCount = Perbaikan::count();
        return view('dashboard', [
            'userCount' => $userCount,
            'peralatanCount' => $peralatanCount,
            'penjadwalanCount' => $penjadwalanCount,
            'perbaikanCount' => $perbaikanCount,
        ]);
    }
}
