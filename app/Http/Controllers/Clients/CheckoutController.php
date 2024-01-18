<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;
use App\Models\CartDetails;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class CheckoutController extends Controller
{
    public function getCheckout(Request $request){
        if (Auth::check()){
            $user_id = auth()->user()->id;
            if($user_id){
                $cart_id = Carts::where('user_id', $user_id)->first()->id;
                if ($cart_id){
                    $cart_details = CartDetails::with(['product'=>function($query){
                        $query->with('images')->get();
                    }])->where('cart_id', $cart_id)->get();
                    $total = 0;
                    $count = 0;
                    foreach($cart_details as $item){
                        $total+= ($item->product->discount)*($item->quantity);
                        $count++;
                    }
                    return view('client.checkout', ['cart_details' =>$cart_details, 'total'=>$total, 'count'=>$count]);
                }
            }
        }
        return redirect()->route('formlogin')->with('message', 'Please Login');
    }

    public function addInvoice(Request $request){
        if (!empty($request->sdt) && !empty($request->dc) && !empty($request->gc)){
            try {
                $validatedData = $request->validate([
                    'sdt' => 'required|string|size:10',
                    'dc' => 'required|string',
                    'gc' => 'required|string|max:255',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Dữ liệu không hợp lệ, Laravel sẽ xử lý chuyển hướng tự động
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
            $user_id = auth()->user()->id;
            if($user_id){
                $cart = Carts::where('user_id', $user_id)->first();
                if ($cart->id){
                    $cart_details = CartDetails::where('cart_id', $cart->id)->get();
                    $invoice = Invoice::create([
                        'user_id' => $user_id,
                        'total_amount'=> 0,
                        'address' => $request->dc,
                        'phone_number' => $request->sdt,
                        'notes' => $request->gc,
                        'condition'=> 0
                    
                    ]);
                    $invoice_id = $invoice->id;
                    $total_amount = 0;
                    foreach($cart_details as $item){
                        $total_amount += ($item->product->discount)*($item->quantity);
                       InvoiceDetail::create([
                            'invoice_id' => $invoice_id,
                            'product_id' => $item->product->id,
                            'quantity' => $item->quantity
                       ]);
                    }
                    $invoice->total_amount = $total_amount;
                    $invoice->save();
                    $cart->delete();
                    return redirect()->route('home')->with('success', 'Đã mua hàng thành công');
                }
            }
        }else{
            return redirect()->back()->with('message', 'Thông tin đơn giao hàng không được để trống các trường');
        }
    }
}