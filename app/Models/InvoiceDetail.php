<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Invoice;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity'
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}