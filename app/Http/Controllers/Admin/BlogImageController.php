<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogImageController extends Controller
{
    public function showFormadd(){
        $image_carousels = blog_images::all();
        return view('admin.images_carosel.blog_image', ['image_carousel'=>$image_carousels]);
    }

    public function addImageBlog(Request $request){
        if ($request->hasFile('path') && $request->filled('type')){
            $fileName = pathinfo($request->file('path')->getClientOriginalName(), PATHINFO_FILENAME);
            $type = $request->type;
            $path = $fileName.date('YmdHis').'.jpg';
            $request->file('path')->storeAs('public/images', $path);
            blog_images::create([
                'type'=>$type,
                'path'=>$path
            ]);
            return redirect()->route('showformbogimage');
        }else{
            return redirect()->route('showformbogimage');
        }
    }

    public function show_form_edit($id){
        $image_carousel = blog_images::find($id);
        if ($image_carousel){
            return view('admin.images_carosel.edit_image', ['image_carousel'=>$image_carousel]);
        }

        return redirect()->back()->with('message', 'image_carousel does"t exit');
    }

    public function update(Request $request,$id){
        $image_carousel = blog_images::find($id);
        if ($image_carousel){
            if($request->hasFile('path')){
                $path = $image_carousel->path;
                $fileToDelete = "public/images/$path";
                if (Storage::exists($fileToDelete)) {
                    // Xóa file
                    Storage::delete($fileToDelete);
                    $fileName = pathinfo($request->file('path')->getClientOriginalName(), PATHINFO_FILENAME);
                    $path = $fileName.date('YmdHis').'.jpg';
                    $request->file('path')->storeAs('public/images', $path);
                    $image_carousel->update([
                        'path'=>$path,
                        'type'=>$request->type
                    ]);

                } else {
                    return redirect()->back()->with('message', 'Lỗi không tìm thấy file');
                }   

                return redirect()->route('showformbogimage')->with('success', 'update image carousel thành công');
            }
            return redirect()->route('showformbogimage')->with('success', 'update image carousel thành công');
        }
    }

    public function delete($id){
        $image_carousel = blog_images::find($id);
        $path = $image_carousel->path;
        $fileToDelete = "public/images/$path";
        if (Storage::exists($fileToDelete)) {
            $image_carousel->delete();
            Storage::delete($fileToDelete);
        }
        return redirect()->route('showformbogimage')->with('success', 'delete image carousel thành công');
    }
}