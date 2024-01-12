<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\CartDetails;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartDetailController extends Controller
{
    public function addCartDetail(Request $request){
        if (Auth::check()){
            $user_id = auth()->user()->id;
            $cart_id = Carts::firstOrCreate(['user_id' => $user_id])->id;
            if ($cart_id){
                $cart_products = CartDetails::where('product_id',$request->product_id)->first();
                if ($cart_products) {
                    $cart_products->quantity = $cart_products->quantity+1;
                    $cart_products->save();
                } else {
                    CartDetails::create([
                        'cart_id' => $cart_id,
                        'product_id' => $request->product_id,
                        'quantity' => $request->quantity
                    ]);
                }
                return redirect()->route('home')->with('success','Đã thêm sản phẩm vào giỏ hàng');
            }
        }else{
            return redirect()->route('formlogin')->with('message', 'Vui lòng đăng nhập');
        }
    }

    public function updateQuantity(Request $request){
        if ($request->ajax() && Auth::check()){
            if ($request->quantity && $request->product_id){
                $user_id = auth()->user()->id;
                $cart_id = Carts::where('user_id', $user_id)->first()->id;
                $cart_details = CartDetails::where('cart_id', $cart_id)->where('product_id', $request->product_id)->first();
                $cart_details->quantity = (int)$request->quantity;
                $cart_details->save();
                return [
                    "message" => "update success",
                ];
            }
        }else{
            return redirect()->route('formlogin')->with('message', 'Vui lòng đăng nhập');
        }
    }

    public function deleteProdcutCart(Request $request) {
        if ($request->ajax() && Auth::check()){
            if ($request->product_id){
                $user_id = auth()->user()->id;
                $cart_id = Carts::where('user_id', $user_id)->first()->id;
                $cart_details = CartDetails::where('cart_id', $cart_id)->where('product_id', $request->product_id)->first();
                if ($cart_details) {
                    $cart_details->delete();
                    return response()->json(['status' => 'success', 'message' => 'Product deleted successfully']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Product not found in the cart']);
                }
            }
        }else{
            return redirect()->route('formlogin')->with('message', 'Vui lòng đăng nhập');
        }
    }
}