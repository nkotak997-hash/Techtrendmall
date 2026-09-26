<?php

namespace App\Models;
use App\Models\Category;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // Allow mass assignment for the new fields (RAM, ROM, etc.)
    protected $fillable = [
        'category_id', 'img', 'name', 'des', 'price', 'status', 'brand', 'ram', 'rom',
        'processor', 'battery', 'camera', 'display'
    ];


    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
public function reviews()
{
    return $this->hasMany(Reviews::class);
}
public function averageRating()
{
    return $this->reviews()->avg('rating');
}


}

