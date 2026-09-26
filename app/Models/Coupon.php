<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount', // Replaces the previous 'amount' field
        'expires_at', // Replaces the 'end_date' field
    ];
    protected $casts = [
        'expires_at' => 'datetime',
    ];
    // protected $fillable = [
    //     'code',
    //     'type',
    //     'amount',
    //     'min_purchase_amount',
    //     'start_date',
    //     'end_date',
    //     'usage_limit',
    //     'status',
    // ];
}
