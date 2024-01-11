<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function ajaxSearch(Request $request){
        $key = $request->key;
        $data = Products::where('name', 'like', '%' . trim($key) . '%')
        ->orWhere('price', 'like', '%' . trim($key) . '%')
        ->get();;
        $data = [
            'key'=>$key,
            'data'=>$data
        ];
        // return view('client.home', compact('data',$data));
        return $data;
    }
}