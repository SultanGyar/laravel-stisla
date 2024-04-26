<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('pages.auth.register');
    }

    public function registerPost (Request $request) {
        $user = new User();

        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return view('pages.auth.login');
    }

    public function login() {
        return view('pages.auth.login');
    }

    public function loginPost (Request $request) {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}
