<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function registerPost(Request $request){
        $user = new User();
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->cni = $request->num_cni;
        if(strlen($request->mot_de_passe) < 6 ){
            return back()->with('error', "Password must not be less than 6 characters");
        }
        if(strlen($request->num_cni) != 17){
            return back()->with('error', "NIC must have 17 characters");
        }
        $user->password = Hash::make($request->mot_de_passe);
        $user->save();
        return redirect('/dashboard')->with('success','Register Success');

    }
    public function login(){
        return view('login');
    }
    public function loginPost(Request $request){
        $credentials = [ 
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect('/dashboard')->with('success','Login Success');
        }
        return back()->with('error', 'Error Email or Password'); 
    }
}
