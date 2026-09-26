<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class reviews extends Model
{
    use HasFactory;

    // Allow mass assignment on these attributes
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
