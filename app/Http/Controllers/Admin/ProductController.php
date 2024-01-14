<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product_Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showFormProduct(){
        $categorys = Category::all();
        $brands = Brands::all();
        $products = Products::with('images', 'category', 'brand')->get();
        return view('admin.product.product', ['categorys'=>$categorys, 'brands' => $brands, 'products'=>$products]);
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
            return redirect()->route('showFormProduct')->with('success', 'edit category thành công');
        }else{
            return redirect()->back();
        }
    }

    public function showFormEditProduct($id){
        $categorys = Category::all();
        $brands = Brands::all();
        $product = Products::with('brand', 'category', 'images')->find($id);
        return view('admin.product.edit', ['categorys'=>$categorys, 'brands' => $brands,'product'=>$product]);
    }

    public function updateProduct(Request $request,$id){
        if ($request->filled('name') && $request->filled('category_id') && $request->filled('price')
            && $request->filled('discount') && $request->filled('description')  && 
            $request->filled('brand_id')
        )
        {
            $slug = Str::slug($request->name);
            $product = Products::find($id);
            if ($product){
                if ($request->file('images')){
                    foreach($product->images as $item){
                        $path = $item->path;
                        $fileToDelete = "public/images/$path";
                        if (Storage::exists($fileToDelete)){
                            Product_Image::find($item->id)->delete();
                            Storage::delete($fileToDelete);  
                        }
                        
                        
                    }
                    $product->update([
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
                    return redirect()->route('showFormProduct')->with('success', 'edit category thành công');
                    echo "oko";
                }
                $product->update([
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id,
                    'price' => $request->price,
                    'slug' => $slug,
                    'discount' => $request->discount,
                    'description' => $request->description,
                ]);
                return redirect()->route('showFormProduct')->with('success', 'edit category thành công');
            }
            
            
            return redirect()->route('showFormProduct')->with('message', 'update category thất bại');
        }else{
            return redirect()->back();
        }
    }

    public function deleteProduct($id){
        $product = Products::with('images')->find($id);
        if ($product){
            $images = $product->images;
            foreach ($images as $image) {
                $path = $image->path;
                $fileToDelete = "public/images/$path";
                if (Storage::exists($fileToDelete)){
                    Storage::delete($fileToDelete);  
                }
            }
            $product->delete();
        }
        return redirect()->route('showFormProduct')->with('success', 'delete product thành công');
    }
}