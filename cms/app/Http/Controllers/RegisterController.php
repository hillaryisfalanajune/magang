<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', ['title'=>'Register', 'active'=>'login']);
    }

    //untuk menyimpan user yang registrasi
    public function store(Request $request){
        //validasi
        $validate = $request->validate([
            'name' => 'required|min:2|max:100',
            'username' => ['required','min:4','max:100','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:200'
        ]);

        //password di enkripsi
        $validate['password'] = bcrypt($validate['password']);

        //insert data users
        User::create($validate);
        //$request->session()->with('status','Register berhasil');
        return redirect('/login')->with('status','Register berhasil');

        //dd('Register berhasil');
    }
}