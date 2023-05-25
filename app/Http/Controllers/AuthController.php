<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password')));{
            return redirect('/home');
        }
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registrasi(){
        return view('Login.registrasi');
    }
    
    public function simpanregistrasi(Request $request){
        // dd($request->all());

        User::create([
            'name'=> $request->name,
            'level'=> 'pegawai',
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token'=> Str::random(60),
        ]);
        return view('welcome');
    }
}
