<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayemtlinkController extends Controller
{
    public function index(){
        $links = [];
        return view('user.payment-links',compact('links'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
