<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NxtApiKeys extends Model
{
    use HasFactory;


    protected $fillable = [
        'test_api_key',
        'live_api_key'
    ];

    //get the user that owns this collection
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
