<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'username', 'product_name','product_ids', 'total_price', 'city', 'address', 'payment_method', 'payment_id', 'status' ];
    public function product()
    {
        return $this->belongsTo(Product::class);
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Assuming 'customer_id' in the wishlist table references 'id' in the users table.
    }
}
