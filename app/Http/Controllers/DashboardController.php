<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function indexProfil(){
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.profil', ['user' => $user]);
    }

    public function indexMining(){
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.mining', ['user' => $user]);
    }

    public function indexAction(){
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.makeaction', ['user' => $user]);
    }

    public function postProfil(Request $request){
        $user = User::where('id',Auth::user()->id)->get()->first();
        if(empty($request->password)){
            $password = Auth::user()->password;
        }else{
            $password = Hash::make($request->password);
        }
        if(strlen($request->cni) != 17){
            return redirect()->back()->With('error','Veuillez modifier votre numero de CNI avec un numero correct.');
        }
        $user->update([
            'name' => $request->nom,
            'cni' => $request->cni,
            'password' =>$password,
        ]);
        return redirect()->back()->With('success','Informations modifiée avec succès !');
    }
}
