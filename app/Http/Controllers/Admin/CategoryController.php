<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function ShowFormCategory(){
        return view('admin.category');
    }

    public function addCategory(Request $request){
        if ($request->hasFile('path') && $request->filled('name')){
            $fileName = pathinfo($request->file('path')->getClientOriginalName(), PATHINFO_FILENAME);
            $name = $request->name;
            $path = $request->file('path')->storeAs('public/images', $fileName.date('YmdHis').'.jpg');
            $slug = Str::slug($name);
            Category::create([
                'name'=>$name,
                'path'=>$fileName.date('YmdHis').'.jpg',
                'slug'=>$slug
            ]);
            return redirect()->route('formCategory');
        }else{
            return redirect()->route('formCategory');
        }
    }
}