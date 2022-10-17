<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NxtCollections extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'client_phone',
        'transaction_id'
    ];

    //get the user that owns this collection
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
