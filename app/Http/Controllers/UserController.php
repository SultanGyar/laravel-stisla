<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Kolom harus diisi',
            'unique' => 'Nama sudah terdaftar dalam sistem',
            'confirmed' => 'Kata sandi tidak cocok',
        ];

        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'level' => 'required',
        ], $message);

        $array = $request->only([
            'username', 'password', 'level'
        ]);

        $array['password'] = bcrypt($array['password']);
        $users = User::create($array);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->route('user.index')->with('error_message', 'User with ID ' . $id . ' not found');
        }

        return view('user.edit', ['users' => $users]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Kolom harus diisi',
            'unique' => 'Nama sudah terdaftar dalam sistem',
            'confirmed' => 'Kata sandi tidak cocok',
        ];
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'sometimes|nullable|confirmed',
            'level' => 'required'
        ], $message);

        $users = User::find($id);
        $users->username = $request->username;
        if ($request->password) $users->password = bcrypt($request->password);
        $users->level = $request->level;
        $users->save();
        return redirect()->route('user.index')->with('success_message', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $users = User::find($id);

        if ($id == $request->user()->id) return redirect()->route('user.index')->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($users) $users->delete();
        return redirect()->route('user.index')->with('success_message', 'User deleted successfully.');
    }
}
