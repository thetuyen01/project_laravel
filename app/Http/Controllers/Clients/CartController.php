<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\CartDetails;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart(Request $request){
        if ($request->ajax() && Auth::check()){
            $user_id = auth()->user()->id;
            if($user_id){
                $cart_id = Carts::where('user_id', $user_id)->first()->id;
                if ($cart_id){
                    $cart_details = CartDetails::with(['product'=>function($query){
                        $query->with('images')->get();
                    }])->where('cart_id', $cart_id)->get();

                    return [
                        'data'=>$cart_details,
                        'status'=>true
                    ];
                }
            }
        }else{
            return [
                "message"=>"oke2"
            ];
        }
    }
}