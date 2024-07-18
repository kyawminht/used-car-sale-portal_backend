<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'make', 'model', 'registration_year', 'price', 'description', 'picture_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
