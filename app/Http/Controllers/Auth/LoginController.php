<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $redirectTo = '/user';

    public function index(){

    }

    public function login(Request $request){
        if($request->method() == 'POST'){
            $input = $request->all();
  
            
            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            
            if($fieldType == 'username'){
                $this->validate($request, [
                    'username' => 'required',
                    'password' => 'required',
                ]);
            }else{
                $this->validate($request, [
                    'username' => 'required|email',
                    'password' => 'required',
                ]);
            }
            
            if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
            {
                return redirect()->route('user');
            }else{
                return redirect()->route('login')
                    ->with('error','Wrong inputs, try again or create new account.');
            }
        }else{
            return view('auth.login');
        }
    }
}
