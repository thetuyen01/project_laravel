<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showAllProductsInCategory(Request $request,$slug)
    {
        // Lấy tất cả sản phẩm trong danh mục và chuyển đến view
        if($slug){
            $price = $request->price;
            $brand = $request->brand;
            $category_id = Category::where('slug',$slug)->first()->id;
            $products = Products::with('images')->where('category_id', $category_id)->get();
            $brands = Brands::all();
            return view('client.all_products', ['products'=>$products, 'brands' => $brands]);
        }else{
            return redirect()->back();
        }
    }

    public function detailProducts($slug_category,$slug_product){
        if(!empty($slug_product)){
            $product = Products::with('brand')->with('images')->where('slug', $slug_product)->first();
            return view('client.detail_product', ['product'=>$product]);
        }
    }

}