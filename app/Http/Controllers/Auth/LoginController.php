<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

     public function store(Request $request)
    {
        $request->validate([
            'email_username' => ['required'],
            'password' => ['required'],
        ]);

        $email_username = strtolower($request->email_username);
        $user = User::where('email', $email_username)->orWhere('username', $email_username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('beranda.index')->with('success', 'Login Berhasil, Selamat Bekerja '.$user->nama);
        } else {
            return back()->with('error', 'Harap periksa kembali email/username dan password anda.');
        }
    }
}
