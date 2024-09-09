<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',  // Ubah dari email ke name
            'password' => 'required',
        ]);
    
        // Cek apakah checkbox 'remember' dicentang
        $remember = $request->has('remember');
    
        // Gunakan 'remember' jika dicentang
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
   

}
