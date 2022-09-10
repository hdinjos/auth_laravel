<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //
    public function index(){
        if($user = Auth::user()){
            if ($user->level == 'admin'){
                return redirect()->intended('admin');
            } elseif ($user->level === 'editor'){
                return redirect()->intended('editor');
            }
        }
        return view('login');
    }

    public function login_process(Request $request){
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');

        if(Auth::attempt($credential)){
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('admin');
            } elseif ($user->level == 'editor'){
                return redirect()->intended('editor');
            }

            return redirect()->intended('/');
        }
        return redirect('login')->withInput()->withErrors(['login gagal' => "This Credential not valid"]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
