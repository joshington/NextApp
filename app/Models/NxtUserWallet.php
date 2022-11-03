<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NxtUserWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_unsettled_amount',
        'total_settled_amount',
        'previous_settled_amount'
    ];



}
