<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mining_Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('pages.dashboard', ['user' => $user]);
    }

    public function indexProfil(){
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.profil', ['user' => $user]);
    }

    public function postProfil(Request $request){
        $user = User::where('id',Auth::user()->id)->get()->first();
        if(empty($request->password)){
            $password = Auth::user()->password;
        }else{
            $password = Hash::make($request->password);
        }
        if(empty($request->nom)){
            return redirect()->back()->With('error','Votre nom ne peut être vide veuillez modifier avec un nom correct et non vide.');
        }
        if(strlen($request->cni) != 17){
            return redirect()->back()->With('error','Veuillez modifier votre numero de CNI avec un numero correct.');
        }
        $user->update([
            'name' => $request->nom,
            'cni' => $request->cni,
            'password' =>$password,
        ]);
        return redirect()->back()->With('success','Informations modifiées avec succès !');
    }
}
