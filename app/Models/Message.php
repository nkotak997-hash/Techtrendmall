<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages'; // Ensure this matches your table name
    // Define any fillable properties if necessary
    // public $timestamps = false;
    protected $fillable = ['name', 'email', 'message', 'reply'];
}
