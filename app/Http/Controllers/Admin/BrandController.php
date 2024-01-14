<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showFormBrand(){
        $brands = Brands::all(); 
        return view('admin.brand.brand', ['brands' => $brands]);
    }

    public function addBrand(Request $request){
        if ($request->filled('name')){
            Brands::create([
                'name' => $request -> name
            ]);
            return redirect()->route('formBrand')->with('success', 'Tạo thành công');
        }else{
            return redirect()->back();
        }
    }

    public function showFormedit($id){
        $brand = Brands::find($id);
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    public function updateBrand(Request $request){
        if (!empty($request->name)){
            Brands::find($request->brand_id)->update(['name'=>$request->name]);
            return redirect()->route('formBrand')->with('success', 'edit thành công');
        }
    }

    public function deleteBrand($id){
        Brands::find($id)->delete();
        return redirect()->route('formBrand')->with('success', 'delete thành công');
    }
}