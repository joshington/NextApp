<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder\table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\NxtUserWallet;


class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NxtUserWallet::create([
            'user_id' => 1,
         //we dont wanna delete collections cz we need data
            'total_unsettled_amount' => 300000,
            'total_settled_amount' => 250000,
            'previous_settled_amount' => 100000
        ]);
    }
}
