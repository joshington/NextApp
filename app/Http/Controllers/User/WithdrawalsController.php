<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    public function index(){
        $withdrawals = [];
        return view('user.withdraws.all',compact('withdrawals'));
    }

    public function withdrawal(){
        return view('user.withdraws.new');
    }
}
