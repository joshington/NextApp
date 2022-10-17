<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nxt_business_kyc extends Model
{
    use HasFactory;

    //now adding the inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'business_name',
        'business_address',
        'business_phone',
        'nid_path',
        'cic_path'
    ];

}
