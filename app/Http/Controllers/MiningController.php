<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mining_Bot;
use App\Models\Mining_Activity;
use App\Models\Mining_BotPayment;
use Illuminate\Support\Facades\Auth;

class MiningController extends Controller
{
    public function indexMining(){
        $user = User::findOrFail(Auth::user()->id);
        $bots = Mining_Bot::all();
        $userBotPayments = $user->botPayments;

        return view('pages.mining', ['user' => $user, 'bots' => $bots, 'userBotPayments' => $userBotPayments]);
    }
}
