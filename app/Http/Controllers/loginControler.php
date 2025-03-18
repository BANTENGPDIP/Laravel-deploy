<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginControler extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
        $credential = $request -> validate([
            "email" => ['required',"email"],
            "password" => ['required'],
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            session([
                'user_data' => Auth::user()
            ]);

            return redirect('/admin');
        }else{
            return back()->with('error', 'Gagal login. Email atau password salah!');
        }
    }

    public function register(){
        return view('admin.register');
    }

    public function registerStore(Request $request){
        $request->validate([
            "name" => ['required'],
            "email" => ['required',"email"],
            "password" => ['required'],
            "password_confirmation" => ['required','same:password'],
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        
        return redirect('/admin/login')->with('success', 'Berhasil registrasi!');
    }

    public function logout(){
        Auth::logout();

        return redirect('/admin/login');
    }
}
