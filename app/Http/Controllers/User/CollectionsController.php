<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function index(){
        $collections = [];
        return view('user.deposits.all',compact('collections'));
    }

    public function deposit(){
        return view('user.deposits.new');
    }
}
