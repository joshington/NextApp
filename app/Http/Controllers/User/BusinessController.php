<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = [];
        return view('user.business.all',compact('businesses'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
