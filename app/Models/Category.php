<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'slug',
    ];

    public function products(){
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}