<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categorys = Category::all();
        $products = Products::with('images', 'brand', 'category')->take(8)->get()->toArray();
        $productsChunks = array_chunk($products, 2);
        // dd($productsChunks);
        return view('client.home', ['categorys'=>$categorys, 'products'=>$productsChunks]);
    }
}