<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carts;
use App\Models\Products;

class CartDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity'
    ];

    public function cart(){
        return $this->belongsTo(Carts::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}