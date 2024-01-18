<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders(){
        $user_id = auth()->user()->id;
        $invoices = Invoice::with(['invoice_details'=>function($query){
            $query->with('product.images');
        }])->where('user_id', $user_id)->get();
        $totalAmounts = [];
        if (!$invoices->isEmpty()){
            foreach ($invoices as $invoice) {
                $totalAmount = $invoice->invoice_details->sum(function ($detail) {
                    // Tính tổng tiền cho từng chi tiết hóa đơn
                    return $detail->quantity * $detail->product->discount;
                });
                $quantity = $invoice->invoice_details->sum(function ($detail) {
                    // Tính tổng tiền cho từng chi tiết hóa đơn
                    return $detail->quantity;
                });
                $totalAmounts[$invoice->id] = ['amount'=>$totalAmount, 'quantity'=>$quantity];
            }
            return view('client.orders', ['invoices' => $invoices, 'totalAmounts' => $totalAmounts]);
        }
        
        
        return redirect()->route('home')->with('success', 'Bạn chưa có đơn hàng nào, mời bạn mua hàng');
    }   
}