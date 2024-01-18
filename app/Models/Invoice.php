<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceDetail;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_amount',
        'address',
        'phone_number',
        'notes',
        'condition'
    ];

    public function invoice_details(){
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}