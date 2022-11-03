<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Traits\ApiResponser;
use App\Models\NxtCollections;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bmatovu\MtnMomo\Products\Collection;

use Illuminate\Support\Facades\DB;

use App\Models\NxtApiKeys;
use App\Models\NxtTransactionCharges;
use App\Models\NxtUserWallet;
use App\Models\NxtWithdraw;
use App\Models\AdminProfits;
use Bmatovu\MtnMomo\Products\Disbursement;

//use Brick\Math\BigInteger;




class ApiController extends Controller
{
    public function getApiKey()
    {
        //first check if user is logged in

    }
    public function collectSample(Request $request)
    {
            //first get that api key and use it to get the user
            $token = $request->bearerToken();//this gets for me the beares token
            $model_all = NxtApiKeys::all();
            //$model = NxtApiKeys::where('test_api_key', $token)->get(['user_id']);

            $all_users = User::all();


            if(isset($token)){
                $true_id = NxtApiKeys::where('test_api_key',$token)->first();
                $now_id = $true_id->user_id;

                if($true_id){
                    $user_now = User::find($now_id);
                    if($user_now){
                        $request->validate([
                            'phone' => 'required|string',
                             //should i aswell collect the amount from here===
                            'amount' => 'required'
                        ]);
                         //==now only proceed if these are given
                         //and dont forget to apppend the transaction charges, to append them on
                         //initiating transaction
                         //first retrieve the model basing on the user_id
                        $model = NxtTransactionCharges::where('user_id','=',$now_id)->first();
                        $actual_deposit = $model->value_deposit;
                        $check_percent = $model->is_percent;





                        $charge = 0;
                        //==variable to store the maximum accountn balance
                        $max_account_balance = 20000000; //mtn max account balance

                        if($check_percent){

                             //meaning its true to use percent format
                            $total_percent = 100;
                            $charge = $actual_deposit/$total_percent * $request->amount;
                             //$charge = (($value_deposit/$total_percent)*($request->amount));
                        }else{
                            $charge = $actual_deposit;
                        }

            //             //==remember mobile money has a collection limit so first check that
                        $user_wallet =  NxtUserWallet::where('user_id','=',$now_id)->first();
                        $previous_unsettled = $user_wallet->total_unsettled_amount;



                        if($previous_unsettled === $max_account_balance ){
                            return response([
                                'message' => 'maximum account balance reached'
                            ]);
                        }else{
            //                 //now that we have gotten the transaction charge go ahead and add it to the amount
                            $collection = new Collection();
                            $momoTransactionId = $collection->requestToPay(
                            'transactionId',$request->phone, $request->amount+$charge);
            //                 //the second parameter is the test number but will use the phone provided
            //                 //and the amount provided in the request.
            //                 //===after initiating that we have to first check its status.
                            $collection_status = $collection->getTransactionStatus($momoTransactionId);
            //                 //==also get the current time to track the time transaction took place.
            //                 //==and us it to avoid double posting==


                            if($collection_status['status'] == 'SUCCESSFUL'){
                             //===if successful===handle the following===

                                $user_collection = new NxtCollections;
                                $user_collection->collected_amount = $request->amount;

                                $user_collection->collected_amount = $request->amount;

                                $user_collection->user_id = $now_id;
                                $user_collection->client_phone = $request->phone;
                                $user_collection->transaction_id = $momoTransactionId;
                             //===use push to save model and its rxships aswell
            //                 //===just add condition that while current time = + 24hours

                                $user_collection->push();


            //                 //===now inconsideration of the new collection
                                $now_wallet = new NxtUserWallet;
                                $now_wallet->total_unsettled_amount = $previous_unsettled+$request->amount;
                                $now_wallet->user_id = $now_id;

                                $now_wallet->push();
                             //literally u havent added appending the table for profits
            //                 //==how do i make sure that money is settled in the collections
            //                 //===get the collection of the user
            //                 //=======continue ====from here===

            //                 //===push the collection charge to the admin wallet====






                                $admin_profit = new AdminProfits;
                                $admin_profit->profit_amount = $charge;
                                $admin_profit->user_id = $now_id;
                                $admin_profit->transaction_id = $momoTransactionId;
                                $admin_profit->save();
            //                 //==now i have saved the collected charge in the admin profits===
                                return response(
                                    [
                                        'status' => $collection_status,
                                        'trans_id' => $momoTransactionId,
                                        'message' => 'successful'
                                    ]
                                );
                            }else if($collection_status['status'] == 'PENDING'){
            //                 //dont want to have double posting
                                return response(
                                    [
                                     'status' => $collection_status,
                                     'trans_id' => $momoTransactionId,
                                     'message' => 'pending'
                                ]
                            );
                        }else{
            //                 //also when it failed we need to indicate
                            return response(
                                [
                                    'status' => $collection_status,
                                     'message' => 'collection failed',
                                     'trans_id' => $momoTransactionId,
                                ]
                            );
                        }
                    }
                }else{
                    return response()->json('Cant find user with api key');
                }
            }else{
                 return response()->json('Provide  api key');
            }

        }
    }

    //=====so after collecting money, how does one disburse the money collected====
    //===so cases for money withdraw
    public function withdraw(Request $request)
    {
        //first get that api key and use it to get the user
        $token = $request->bearerToken();//this gets for me the beares token
        if(isset($token)){
            $true_id = NxtApiKeys::where('test_api_key',$token)->first();
            $now_id = $true_id->user_id;

            $user_now = User::find($now_id);

            if($user_now){
                $request->validate([
                   'amount' => 'required',
                   'phone' => 'required' //first add phone number u will remove it later
                ]);
                $model = NxtTransactionCharges::where('user_id','=',$now_id)->first();

                //==retrieve percent condition and withdraw charges
                $check_percent = $model->is_percent;
                $withdraw_charges = $model->value_withdraw;



                $charge = 0;
                if($check_percent){
                    //meaning its true to use percent format
                    $total_percent = 100;
                    $charge = $withdraw_charges/$total_percent * $request->amount;
                    //$charge = (($value_deposit/$total_percent)*($request->amount));
                }else{
                    $charge = $withdraw_charges;
                }
                //===>user phone number is vital to capture===
                $user_phone = $user_now->phone;

                //===what is the minimum wihdraw limit
                $max_withdraw_limit = 5000000;
                //dont forget the maximum amount on the account of mobile money

                //===though minimum transaction amount allowed is 500, but
                //for us we shall use 1000,===
                $min_withdraw = 1000;
                //==also note that u are supposed to have a minimum balance
                //let me make it 100,0000, minimum amount in your wallet
                $minimum_wallet_balance = 100000;
                //dont forget also now the charges by mtn but now thats controlled by mtn.
                //===also add algo that previosu
                //==going ahead
                $user_wallet =  NxtUserWallet::where('user_id','=',$now_id)->first();
                $total_settled = $user_wallet->total_settled_amount;
                if(
                    $request->amount > $min_withdraw && $request->amount < $max_withdraw_limit
                    && $total_settled > $minimum_wallet_balance
                ){
                    $disbursement = new Disbursement();
                    $momoTransactionId = $disbursement->transfer('transactionId', $request->phone, $request->amount);
                    //==first ge the disbursement transaction status
                    $trans_status = $disbursement->getTransactionStatus($momoTransactionId);
                    if($trans_status['status'] == 'SUCCESSFUL'){
                        //deduct money from the wallet, from the settled balance
                        $current_unsettled = $total_settled-$request->amount+$charge;
                        //after deducting from there
                        $withdraw =  new NxtWithdraw;
                        $withdraw->withdrawed_amount = $request->amount;
                        $withdraw->user_id = $now_id;
                        $withdraw->transaction_id = $momoTransactionId;

                        //save the withdraw made
                        $withdraw->save();

                        //change the wallet actual balance which is settled since we withdraw from settled
                        $total_settled = $total_settled-$request->amount+$charge;
                        $user_wallet->push();//saving even the rxnships
                        //so after settling the wallet we also need to settle the admin profits

                        //==go ahead and create the Admin profits table===
                        $admin_profit = new AdminProfits;
                        $admin_profit->profit_amount = $charge;
                        $admin_profit->user_id = $now_id;
                        $admin_profit->transaction_id = $momoTransactionId;
                        $admin_profit->save();

                        return response([
                            'status' => true,
                            'message' => 'Withdraw successful',
                           'trans_id' => $momoTransactionId,
                            'trans_status' => $trans_status
                        ]);

                    }else if($trans_status['status'] == 'PENDING'){
                        return response([
                            'status' => false,
                            'message' => 'widthdraw pending',
                            'trans_id' => $momoTransactionId,
                            'trans_status' => $trans_status
                        ]);
                    }else{
                        return response(
                            [
                                'status' => false,
                                'message' => 'withdraw failed'
                            ]
                        );

                    }
                }else{
                    return response([
                        'status' => false,
                        'message' => 'Below minimum withdraw amount'
                    ]);
                }
            }
        }
    }
}













