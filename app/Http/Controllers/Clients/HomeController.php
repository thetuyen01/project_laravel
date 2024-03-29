<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\blog_images;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $category_menu = Category::all();
        $categories = Category::with(['products' => function ($query) {
            $query->take(8)->with('images');
        }])->get();
        $products = Products::with('images', 'brand', 'category')->take(8)->get()->toArray();
        $productsChunks = array_chunk($products, 2);
        $image_carousel = blog_images::all();
        return view('client.home', ['categorys'=>$category_menu, 'products'=>$productsChunks, 'categoryDM'=>$categories, 'image_carousel'=>$image_carousel]);
    }
}