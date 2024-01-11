<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog_images;
use Illuminate\Http\Request;

class BlogImageController extends Controller
{
    public function ShowFormBlogImage(){
        return view('admin.blog_image');
    }

    public function addImageBlog(Request $request){
        if ($request->hasFile('path') && $request->filled('name')){
            $fileName = pathinfo($request->file('path')->getClientOriginalName(), PATHINFO_FILENAME);
            $type = $request->type;
            $path = $fileName.date('YmdHis').'.jpg';
            $request->file('path')->storeAs('public/images', $path);
            blog_images::create([
                'type'=>$type,
                'path'=>$path
            ]);
            return redirect()->route('formCategory');
        }else{
            return redirect()->route('formCategory');
        }
    }
}