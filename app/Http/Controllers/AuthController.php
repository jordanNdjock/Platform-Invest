<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerPost(Request $request){

        $user = new User();
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->cni = $request->num_cni;
        if(strlen($request->mot_de_passe) < 6 ){
            return back()
            ->withInput($request->except('mot_de_passe'))
            ->with('error', "Le mot de passe ne doit pas avoir moins de 6 caractères");
        }
        if(strlen($request->num_cni) != 17){
            return back()
            ->withInput()
            ->with('error', "Le numéro de CNI doit avoir 17 caractères");
        }
        try{
            $user->password = Hash::make($request->mot_de_passe);
            $user->save();
            Auth::login($user);
            return redirect('/dashboard')->with('success','Compte crée avec succès ! Bienvenue ');
        }catch(QueryException $e){
            if ($e->errorInfo[1] == 1062) {
                return back()
                    ->withInput()
                    ->with('error', 'Un compte avec cet email existe déjà !');
            }
        }
        

    }
    public function login(){
        return view('auth.login');
    }
    public function loginPost(Request $request){
        $credentials = [ 
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect('/dashboard')->with('success','Connexion réussie ! content de vous revoir ');
        }else {
            $user = User::where('email', $request->email)->first();
    
            if (!$user) {
                return back()->with('error', "Cet utilisateur n'existe pas.");
            } else {
                return back()
                ->withInput($request->except('password'))
                ->with('error', "Le mot de passe est incorrect.");
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
