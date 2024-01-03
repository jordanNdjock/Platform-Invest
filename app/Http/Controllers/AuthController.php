<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Mining_BotPayment;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Mail\PasswordMail;


class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerPost(Request $request){
        //pour la génération du lien d'invivitation
        $informations = $request->email . $request->mot_de_passe;
        $HashKey = hash('sha256', $informations);
        $invitation_code = substr($HashKey, 0, 10);
        
        $user = new User();
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->cni = $request->num_cni;
        $user->code_invitation = $invitation_code;
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
        //Attribution du gain par lien d'invitation
        if(!empty($request->code_invitation)){
            $userFind = User::Where('code_invitation',$request->code_invitation)->first();
            if($userFind){
                $userFind->solde += 25;
                $userFind->save();
            }else{
                return back()
                ->WithInput($request->except('lien_invitation'))
                ->With('error', 'Le code d\'invitation est invalide ! Vous pouvez laissez le champ vide ou saisir un code valide');
            }
        }
       
        try{
            $user->password = Hash::make($request->mot_de_passe);
            $user->save();
            Auth::login($user);

            //Achat du bot VIP0
            $payment = new Mining_Botpayment();
            $payment->bot_payé = 'oui';
            $payment->montant_bot = 0;
            $payment->users_id = Auth::user()->id;
            $payment->mining_bots_id = 1;
            $payment->save();

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

    public function forgot(){
        return view('auth.forgot_password.forgot_password');
    }

    public function forgotPost(Request $request){
        
            $utilisateur = User::where('email', $request->email)->first();

            if (!$utilisateur) {
                return back()->with('error', 'Aucun utilisateur avec cet email.');
            }
            $jeton = Str::random(32);

            $contenu = [
                'title' => 'Code de reinitialisation de mot de passe sur Link Platform',
                'body' => ' Voici votre code de reinitialisation de mot de passe Link : '.$jeton.', ne le donner à personne, copiez et collez le sur la plateforme !'
            ];
            $utilisateur->update([
                'remember_token' => $jeton
            ]);
            \Mail::to($utilisateur->email)->send(new PasswordMail($contenu));
            
            session(['jeton_reset_password' => $jeton, 'jeton_reset_password_expiration' => now()->addHour()]);
        
            return redirect('/code')->with('success', 'Un mail de réinitialisation de mot de passe a été envoyé. Veuillez entrer le code que vous avez reçu');
       
    }

    public function code(){
        return view('auth.forgot_password.code');
    }

    public function codePost(Request $request){
        
            if (($request->session()->has('jeton_reset_password') && $request->token == $request->session()->get('jeton_reset_password')) &&
            ($request->session()->has('jeton_reset_password_expiration') &&
            now() < $request->session()->get('jeton_reset_password_expiration'))) {
            $request->session()->forget(['jeton_reset_password', 'jeton_reset_password_expiration']);
            session(['jeton_reset_password' => $request->token]);
            return redirect('/reinitialized')->with('success', 'Code de reinitialisation valide, vous pouvez modifier votre mot de passe');
            
            }else{
                return back()->with('error', 'Code de réinitialisation invalide ou expiré.');
            }
       
    }

    public function reinitialized(){
        return view('auth.forgot_password.reinitialized_password');
    }

    public function reinitializedPost(Request $request){
        
        if ($request->session()->has('jeton_reset_password')) {
            $user = User::where('remember_token',($request->session()->get('jeton_reset_password')));
            if($user){
                if(strlen($request->password) < 6 || strlen($request->passwordC) < 6){
                    return back()->with('error', 'Le mot de passe ne doit pas avoir moins de 6 caractères');
                }else{
                    if($request->password == $request->passwordC){
                        $user->update([
                            'password' => Hash::make($request->password),
                            'remember_token' => null
                        ]);
                        return redirect('/login')->with('success', 'Mot de passe modifié avec succès, vous pouvez vous connecter.');
                    }else{
                        return back()->with('error','Les mots de passe ne sont pas identiques');
                    }
                }
                
            }
            
        }else{
            return back()->with('error', 'Code de réinitialisation invalide ou expiré.');
        }
   
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
