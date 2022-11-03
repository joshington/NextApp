<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\NxtUserWallet;
use App\Models\NxtCollections;

class SettleCollections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collections:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'settle collections after every 24 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        //return Command::SUCCESS;
        //have to settle collections after 24 hours in the wallet
        //have to first get all the users
        $all_collections = NxtCollections::all();

        foreach($all_collections as $col){
            $user_collected = $col->collected_amount;
            $user_id = $col->user_id;

            $wallet_user = NxtUserWallet::where('user_id',$user_id)->first();
            $wallet_user->total_unsettled_amount = $wallet_user->total_unsettled_amount - $user_collected;
            $wallet_user->previous_settled_amount = $wallet_user->total_settled_amount;
            $wallet_user->total_settled_amount = $wallet_user->total_settled_amount + $user_collected;
        }

    }
}
