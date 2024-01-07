<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product_Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function showFormProduct(){
        $categorys = Category::all();
        $brands = Brands::all();
        return view('admin.product', ['categorys'=>$categorys, 'brands' => $brands]);
    }

    public function addProduct(Request $request){
        if ($request->filled('name') && $request->filled('category_id') && $request->filled('price')
            && $request->filled('discount') && $request->filled('description') && $request->file('images') && 
            $request->filled('brand_id')
        )
        {
            $slug = Str::slug($request->name.'#'.$request->category_id);
            $product = Products::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'slug' => $slug,
                'discount' => $request->discount,
                'description' => $request->description,
            ]);
            $images = $request->file('images');

            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $fileName = pathinfo($imageName, PATHINFO_FILENAME);
                $path = $fileName.date('YmdHis').'.jpg';
                $image->storeAs('public/images', $path);

                Product_Image::create([
                    'product_id' => $product->id,
                    'path'=>$path
                ]);
            }
            return redirect()->route('showFormProduct');
        }else{
            return redirect()->back();
        }
    }
}