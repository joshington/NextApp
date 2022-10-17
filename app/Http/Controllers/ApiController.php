<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use App\Models\NxtCollections;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Bmatovu\MtnMomo\Products\Collection;


class ApiController extends Controller
{
    //
    public function testin()
    {
        return response(['message' => 'testing']);
    }


    public function collectSample()
    {


            $collection = new Collection();
            $momoTransactionId = $collection->requestToPay(
                'transactionId','46733123454', '100');
            $collection_status = $collection->getTransactionStatus($momoTransactionId);
            $user=Auth::user();
            print_r($user);
            return response(
                [
                    'status' => $collection_status,
                    'trans_id' => $momoTransactionId,
                ]
            );
    }


    //have to authenticate user through API keys, cz we need the user's keys

    public function collectMoney(Request $request)
    {
        //==guess we have to first retrieve the authenticated user
        $user = Auth::user();
        if($user){
            //only go ahead if its the user
            //then che
            $request->validate([
                'phone' => 'required|string',
                //should i aswell collect the amount from here===
                'amount' => 'required|string'
            ]);
            if($request->phone && $request->amount){
                //go on ahead with the deposit, fields we need from user is phone and amount
                //its time to implement the api

                //on the amount dont forget to append the deposit fees and
                //'46733123454'
                //100
                $collection = new Collection();
                $momoTransactionId = $collection->requestToPay(
                    'transactionId',$request->phone, $request->amount);
                //the second parameter is the test number but will use the phone provided
                //and the amount provided in the request.

                //===after initiating that we have to first check its status.
                $collection_status = $collection->getTransactionStatus($momoTransactionId);
                if($collection_status == 'SUCCESSFUL'){
                    //go ahead, and create the collections table
                    //but initially have to first find the transaction charges
                    //lets get the user's data
                    $user = Auth::user();
                    //==can first want to print the user
                    print_r($user); //this prints the model
                    //$id = $user->id;
                    //now pick the Collection and create it with the user id

                    //===just create a new table
                    $new_collection = new NxtCollections;
                    $new_collection->amount = $request->amount;
                    $new_collection->client_phone = $request->phone;
                    $new_collection->transaction_id = $momoTransactionId;
                    $new_collection->user_id = $user->id;

                    $result=$new_collection->save();
                    if($result){
                        return response(['Result'=>"Collection successful"]);
                    }
                }elseif($collection_status == 'PENDING'){
                    return response([
                        'message' => "Transaction pending"
                    ]);
                }else{
                    return response([
                        'message' => "Collection failed"
                    ]);
                }
            };

        }
    }


}

// public function register(Request $request)
// {
//     $fields = $request->request([
//         'name' => 'required|string',
//         'email' => 'required|string|unique:users,email',
//         'password' => 'required|string|confirmed'
//     ]);

//     $user = User::create([
//         'name' => $fields['name'],
//         'email' => $fields['email'],
//         'password' => bcrypt($fields['password'])
//     ]);

//     $token = $user->createToken('myapptoken')->plainTextToken;

//     $response =[
//         'user' => $user,
//         'token' => $token
//     ];

//     return response($response, 201);
// }


// public function login(Request $request)
// {
//     $fields = $request->request([
//         'email' => 'required|string',
//         'password' => 'required|string'
//     ]);

//     //check email
//     $user = User::where('email', $fields['email'])->first();

//     //check password
//     if(!$user || !Hash::check($fields['password'], $user->password)){
//         return response([
//             'message' => 'Bad creds'
//         ], 401);
//     }
//     $token = $user->createToken('myapptoken')->plainTextToken;

//     $response =[
//         'user' => $user,
//         'token' => $token
//     ];

//     return response($response, 201);
// }


// public function logout(Request $request)
// {
//    auth()->user()->tokens()->delete();

//     return [
//         'message' => 'Logged out'
//     ];
// }

