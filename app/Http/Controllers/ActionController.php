<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    public function indexAction(){
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.makeaction', ['user' => $user]);
    }
}
