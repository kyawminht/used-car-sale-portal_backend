<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id', 'user_id', 'bid_price'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
