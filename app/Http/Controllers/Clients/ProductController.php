<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showAllProductsInCategory($slug)
    {
        // Lấy tất cả sản phẩm trong danh mục và chuyển đến view
        if($slug){
            $products = Category::with('products')->where('slug',$slug)->get();
            return view('client.all_products', compact('products'));
        }else{
            return redirect()->back();
        }
    }
}