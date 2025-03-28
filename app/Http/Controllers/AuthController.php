<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
            return redirect('/dashboard');
        }

        $data = array(
            'title'  => 'Halaman Login',
        );

        return view('Auth.Login', $data);
    }

    public function cek_login(Request $request)
    {

        // $password = $request->input('password');
        // $email = $request->input('email');
        // // // Validasi Input
        //  $credentials = $request->validate([
        //      'email' => ['required', 'email'],
        //      'password' => ['required'],
        // ]);

        // // Coba Autentifikasi
        // if (Auth::attempt($credentials)) {
        //     // $user = Auth::user();

        //     // Cek Status User
        //     if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password, 'is_active' => 'Aktif'])) {
        //         return redirect('/login')->with('error', 'Akun Anda Belum Aktif. Silahkan Hubungi Admin');
        //     }

        //     // jika aktif
        //     // $request->session()->regenerate();
        //     return redirect('/dashboard')->with('success', 'Login Berhasil');
        // }

        // // jika gagal
        // return redirect('/login')->with('error', 'Email atau Password Salah');


        $password = $request->input('password');
        $email = $request->input('email');

         
        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password, 'is_active' => 'Aktif']))
        {
            // if(['is_active' => 'Nonaktif'])
            // {
            //     return redirect('/login')->with('error', 'Akun Anda Belum Aktif. Silahkan Hubungi Admin');
            // }
                return redirect('/dashboard')->with('success', 'Login Berhasil');
            
        } else {
            return redirect('/login')->with('error', 'Email dan Password Salah, atau Akun Anda Belum Aktif');
        }

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
