<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\NxtApiKeys;

use App\Models\nxt_api_keys;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    public function index(){
        return view('user.developer.index');
    }

    //===just get the api keys from here=====
    public function api_settings(){
        $user_id = Auth::user()->id;
        //===get the api keys where user is this
        $test_key  = NxtApiKeys::where('user_id',$user_id)->get(['test_api_key']);

        return view('user.developer.api',
            [
                //'user_id' => $user_id,
                'test_key' => $test_key,
            ]);
    }


    public function api_webhook(){
        return view('user.developer.webhook');
    }
}
