<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function account(){
        return view('user.account-setting');
    }
    //===now storing the details on the db
    
}
