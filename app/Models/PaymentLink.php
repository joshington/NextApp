<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_address',
        'charge_amount',
        'link_name',
        'test_mode'
    ];


    //get the user that owns this collection
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
