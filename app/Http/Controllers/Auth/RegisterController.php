<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        if($request->method() == 'POST'){
            // validate
            $validated = $this->validate($request, [
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
                'password' => 'required|confirmed',
            ]);

            // register
            $user = new User;
            $username = strtolower($validated['first_name']).'-'.strtolower($validated['last_name']).'-' . rand(pow(10, 8 - 1), pow(10, 8) -1);
            $user->first_name = $validated['first_name'];
            $user->last_name = $validated['last_name'];
            $user->phone = (integer)$validated['phone'];
            $user->email = $validated['email'];
            $user->user_type = 'user';
            $user->username = $username;
            $user->password = Hash::make($validated['password']);
            
            if($user->save()){
                return redirect()->route('login')->with('success','Account creation successful.')->with('username',$username);
            }else{
                return redirect()->back()->with('error','Account creation failed, please try again')->withInput();
            }

        }else{
            return view('auth.register');
        }
    }
}
