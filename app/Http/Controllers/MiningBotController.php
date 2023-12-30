<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mining_Bot;
use Illuminate\Support\Facades\Auth;

class MiningBotController extends Controller
{
    public function indexMining(){
        $user = User::findOrFail(Auth::user()->id);
        $bots = Mining_Bot::all();
        return view('pages.mining', ['user' => $user, 'bots' => $bots]);
    }
}
