<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;
use App\Models\NxtTransactionCharges;

class TransactionChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NxtTransactionCharges::create([
            'user_id' => 1,
            'is_percent' => true,
            'value_withdraw' => '10',
            'value_deposit'  => '10'
        ]);
    }
}
