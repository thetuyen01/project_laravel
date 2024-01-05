<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categorys = Category::all();
        return view('client.home', ['categorys'=>$categorys]);
    }
}