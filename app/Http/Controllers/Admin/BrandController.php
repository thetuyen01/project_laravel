<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showFormBrand(){
        return view('admin.brand');
    }

    public function addBrand(Request $request){
        if ($request->filled('name')){
            Brands::create([
                'name' => $request -> name
            ]);
            return redirect()->route('formBrand');
        }else{
            return redirect()->back();
        }
    }
}