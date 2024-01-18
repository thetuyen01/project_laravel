<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getListOrder() {
        $invoice = Invoice::with('user')->get();
        $conditions = [1=>'Đang sử lý',2=>'Đang vận chuyển',3=>'Đang trên đường duy chuyển',4=>'Đã giao thành công'];
        return view('admin.orders.orders', ['invoice' => $invoice, 'conditions'=>$conditions]);
    }

    public function editInvoice(Request $request,$id){
        $invoice = Invoice::find($id);
        $invoice->condition = (int)$request->condition;
        $invoice->save();
        return redirect()->back()->with('success', 'update success');
    }
}