<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index(){
        return view('user.developer.index');
    }

    public function api_settings(){
        return view('user.developer.api');
    }

    public function api_webhook(){
        return view('user.developer.webhook');
    }
}
