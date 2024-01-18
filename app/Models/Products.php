<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product_Image;
use App\Models\CartDetails;
use App\Models\InvoiceDetail;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'price',
        'slug',
        'discount',
        'description'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Product_Image::class, 'product_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brands::class);
    }

    public function cart_details(){
        return $this->hasMany(CartDetails::class, 'product_id', 'id');
    }

    public function invoice_details(){
        return $this->hasMany(InvoiceDetail::class, 'product_id', 'id');
    }
}