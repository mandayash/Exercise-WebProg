<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm()
    {
        // Tampilkan halaman login
        return view('login');
    }

    public function login(Request $request)
    {
        // Logic login
        $credentials = $request->only(['email', 'password']);


        if ($credentials['email'] && $credentials['password']) {

            session([
                'user' => [
                    'email' => $credentials['email'],
                    'is_login' => true
                ]
            ]);

            return redirect('/profile')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Login gagal!');
    }

}
