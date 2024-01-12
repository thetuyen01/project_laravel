<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartDetails;
use App\Models\User;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cart_details(){
        return $this->hasMany(CartDetails::class, 'cart_id', 'id');
    }
}