<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
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

    public function detail_invoice($id){
        $detail_invoices = InvoiceDetail::with('product.images')->where('invoice_id', $id)->get();
        if (!$detail_invoices->isEmpty()) {
            return view('admin.orders.detail_order', ['detail_invoices' => $detail_invoices]);
        }

        return redirect()->back()->with('message', 'Detail invoice not exit');
    }
}