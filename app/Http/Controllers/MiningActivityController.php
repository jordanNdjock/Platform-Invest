<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mining_Activity;
use Illuminate\Support\Facades\Auth;

class MiningActivityController extends Controller
{
    public function indexAction(){
        $user = User::findOrFail(Auth::user()->id);
        return view('pages.makeaction', ['user' => $user]);
    }
}
