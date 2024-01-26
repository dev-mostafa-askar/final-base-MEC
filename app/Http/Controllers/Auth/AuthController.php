<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login_page(){
        return view('auth.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect(route('dashbaord'));
        }
        return back()->withInput(['email' => $data['email']])
        ->with('error', 'email or password incorrect');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
