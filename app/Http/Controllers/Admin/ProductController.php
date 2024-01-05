<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product_Image;
use App\Models\Products;
use Illuminate\Http\Request;

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
            $request->file('brand_id')
        )
        {
            $product = Products::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'description' => $request->description,
            ]);
            $images = $request->file('images');

            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $fileName = pathinfo($imageName, PATHINFO_FILENAME);
                $image->storeAs('public/images', $fileName.date('YmdHis').'.jpg');

                Product_Image::create([
                    'product_id' => $product->id,
                    'path'=>$fileName.date('YmdHis').'.jpg'
                ]);
            }
            return redirect()->route('showFormProduct');
        }else{
            return redirect()->back();
        }
    }
}