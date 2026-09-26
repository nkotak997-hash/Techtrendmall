<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'about_us';

    // Specify which attributes are mass assignable (if needed)
    protected $fillable = ['image', 'des'];
}
