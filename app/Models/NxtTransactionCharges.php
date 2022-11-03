<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NxtTransactionCharges extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_percent',
        'value_withdraw',
        'value_deposit'
    ];

    //get the user that owns this collection
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
