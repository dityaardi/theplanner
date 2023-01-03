<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)//request, mengambil data dari form login
    {  
        //validasi data 
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        //mengecek data dan melakukan autentikasi
        if(Auth::attempt($credentials)){ //jika autentikasi berhasil
            $request->session()->regenerate();//membuat session baru,mencegah hacking

            return redirect()->intended('/dashboard');//redirect ke halaman dashboard dengan session
        }
        //jika autentikasi gagal, kembali lagi dengan pesan error
        return back()->with('failed','Please check your username and password again.');
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'      => 'required|min:5|max:255',
            'username'  => 'required|min:5|max:255|unique:users',
            'password'  => 'required|min:5|max:255',
            'level'     => 'required'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        //membuat data baru di table users
        AuthUser::create($validatedData);
        //membuat alert berhasil registrasi
        $request->session();
        //kembali ke halaman login
        return redirect('/');
    }

    public function logout(Request $request)//request, mengambil data dari session user
    {
        Auth::logout();//panggil auth yang fungsinya logout
    
        $request->session()->invalidate();//invalidkan session
    
        $request->session()->regenerateToken();//buat token baru supaya tak dibajak
    
        return redirect('/');//redirect ke halaman sebelumnya dengan session belum login
    }
}
