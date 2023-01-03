<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request) //request, mengambil data dari form login
    {
        //validasi data 
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //mengecek data dan melakukan autentikasi
        if (Auth::attempt($credentials)) { //jika autentikasi berhasil
            $request->session()->regenerate(); //membuat session baru,mencegah hacking

            return redirect()->intended('/home'); //redirect ke halaman dashboard dengan session
        }
        //jika autentikasi gagal, kembali lagi dengan pesan error
        return back()->with('failed', 'Please check your username and password again.');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request) //request, mengambil data dari form register
    {
        $token = 8626;
        //validasi keunikan data yang di inputkan 
        $validatedData = $request->validate([
            'nip' => 'required',
            'namapegawai'      => 'required|min:5|max:255',
            'email'  => 'required|email:dns|unique:users',
            'password'  => 'required|min:5|max:255',
            'level'  => 'required',
            'tgllahir' => 'required',
            'idpangkat' => 'required',
            'idjabatan' => 'required',
            'periodeawal' => '',
            'periodeakhir' => '',
            'statusaktif' => '',
            'idunit' => 'required',
        ]);
        //enskripsi password dalam database table users
        $validatedData['password'] = Hash::make($validatedData['password']);
        //membuat data baru di table users
        User::create($validatedData);
        //kembali ke halaman login
        return redirect('/register');
    }

    public function logout(Request $request) //request, mengambil data dari session user
    {
        Auth::logout(); //panggil auth yang fungsinya logout

        $request->session()->invalidate(); //invalidkan session

        $request->session()->regenerateToken(); //buat token baru supaya tak dibajak

        return redirect('/'); //redirect ke halaman sebelumnya dengan session belum login
    }
}