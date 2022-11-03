<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    //==specifying the foreignkey relationship here=====
    // public function nxtBusinessKyc()/**
    //  * Get the user that owns the User
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    public function nxtBusinessKyc()
    {
        return $this->hasMany(nxt_business_kyc::class);
    }

    //===one user can have many transaction charges
    public function nxtTransactionCharges()
    {
        return $this->hasMany(NxtTransactionCharges::class);
    }

    //==one user can have many api keys===========
    public function nxtApiKeys()
    {
        return $this->hasMany(NxtApiKeys::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //one user model has one collection model so its a one to one
    public function nxtCollections()
    {
        return $this->hasMany(NxtCollections::class);
    }

    public function nxtUserWallet()
    {
        return $this->hasOne(NxtUserWallet::class);
    }

    public function nxtWithdraw()
    {
        return $this->hasMany(NxtWithdraw::class);
    }

    public function paymentLink()
    {
        return $this->hasMany(PaymentLink::class);
    }
}
