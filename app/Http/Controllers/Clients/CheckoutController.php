<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function getCheckout(){
        // if (Auth::check()){
        //     $user_id = auth()->user()->id;

        // }
        return view('client.checkout');
    }
}