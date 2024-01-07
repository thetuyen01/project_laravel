<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function product(){
        return $this->hasMany(Products::class, 'brand_id', 'id');
    }
}