<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog_images;
use App\Models\User;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function menu(){
        $count_user = User::count();
        $count_brand = Brands::count();
        $count_category = Category::count();
        $count_product = Products::count();
        $count_invoice = Invoice::count();
        $count_images_carousel = blog_images::count();

        return view('admin.admin_home', compact(
            'count_user',
            'count_brand',
            'count_category',
            'count_product',
            'count_invoice',
            'count_images_carousel'
        ));
    }
}