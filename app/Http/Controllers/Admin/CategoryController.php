<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function ShowFormCategory(){
        $categorys = Category::all();
        return view('admin.category.category', ['categorys'=>$categorys]);
    }

    public function addCategory(Request $request){
        if ($request->hasFile('path') && $request->filled('name')){
            $fileName = pathinfo($request->file('path')->getClientOriginalName(), PATHINFO_FILENAME);
            $name = $request->name;
            $path = $fileName.date('YmdHis').'.jpg';
            $request->file('path')->storeAs('public/images', $path);
            $slug = Str::slug($name);
            Category::create([
                'name'=>$name,
                'path'=>$path,
                'slug'=>$slug
            ]);
            return redirect()->route('formCategory')->with('success', 'create category thành công');
        }else{
            return redirect()->route('formCategory');
        }
    }

    public function showFormEditCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function updateCategory(Request $request,$id){
        if ($request->filled('name')){
            $category = Category::find($id);
            $name = $request->name;
            $slug = Str::slug($name);
            if($request->hasFile('path')){
                $path = $category->path;
                $fileToDelete = "public/images/$path";
                if (Storage::exists($fileToDelete)) {
                    // Xóa file
                    Storage::delete($fileToDelete);
                    $fileName = pathinfo($request->file('path')->getClientOriginalName(), PATHINFO_FILENAME);
                    $path = $fileName.date('YmdHis').'.jpg';
                    $request->file('path')->storeAs('public/images', $path);
                    $category->update([
                        'name'=>$name,
                        'path'=>$path,
                        'slug'=>$slug
                    ]);

                } else {
                    return redirect()->back()->with('message', 'Lỗi không tìm thấy file');
                }

                return redirect()->route('formCategory')->with('success', 'edit category thành công');
            }
            
            $category->name = $name;
            $category->slug = $slug;
            $category->save();
            return redirect()->route('formCategory')->with('success', 'edit category thành công');
            
        }else{
            return redirect()->back()->with('message', 'ten và hình ảnh không được để trống');
        }
    }
    
    public function deleteCategory($id){
        $category = Category::find($id);
        $path = $category->path;
        $fileToDelete = "public/images/$path";
        if (Storage::exists($fileToDelete)) {
            $category->delete();
            Storage::delete($fileToDelete);
        }
        return redirect()->route('formCategory')->with('success', 'delete category thành công');
    }
}