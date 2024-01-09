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
            $category = Category::where('slug',$slug)->first();
            if ($category) {
                $products = Products::with('images', 'category')
                    ->where('category_id', $category->id);
        
                $brands = Brands::all();
                $category_name = $category->name;
                // kiểm tra khi lộc giá
                $price = $request->price;
                if (!empty($price)) {
                    $price = json_decode($price[0], true);
                    $products = $products->whereBetween('price', $price);
                }
                // kiểm tra khi lọc nhà sản xuất
                $brand = $request->brand;
                if (!empty($brand)){
                    $products = $products->where('brand_id', $brand);
                }
        
                $products = $products->get();
                return view('client.all_products', ['products'=>$products, 'brands' => $brands, 'category_name'=>$category_name,'brand'=>$brand, 'price' => $price]);
            } else {
                // Xử lý khi không tìm thấy danh mục
            }
            
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