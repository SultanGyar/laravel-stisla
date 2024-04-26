<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointCheck;

class PointCheckController extends Controller
{
    public function index()
    {
        $pointCheck = PointCheck::all();
        return view('point_check.index', [
            'pointCheck' => $pointCheck
        ]);
    }

    public function create()
    {
        return view('point_check.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_point_check' => 'required|unique:tbpoint_check|max:255',
        ]);

        PointCheck::create($request->all());

        return redirect()->route('point_check.index')
            ->with('success', 'Point Check created successfully.');
    }

    public function edit($id)
    {
        $pointCheck = PointCheck::findOrFail($id);
        return view('point_check.edit', [
            'pointCheck' => $pointCheck
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_point_check' => 'required|max:255|unique:tbpoint_check,nama_point_check,' . $id,
        ]);

        $pointCheck = PointCheck::findOrFail($id);
        $pointCheck->update($request->all());

        return redirect()->route('point_check.index')
            ->with('success', 'Point Check updated successfully.');
    }

    public function destroy($id)
    {
        $pointCheck = PointCheck::findOrFail($id);
        $pointCheck->delete();

        return redirect()->route('point_check.index')
            ->with('success', 'Point Check deleted successfully.');
    }
}
