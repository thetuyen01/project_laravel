<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForGetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\ProductController;
use App\Mail\ForGetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/{slug}', [ProductController::class, 'showAllProductsInCategory'])->name('showAllProductsInCategory');




Route::prefix('auth')->group(function(){
    // Route show form đăng nhập
    Route::get('/login', [LoginController::class, 'showFormLogin'])->name('formlogin');
    // Route xử lý đăng nhập
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    // Route xử lý đăng xuất
    Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout');
    // Route xử show form tạo tài khoản
    Route::get('/signup', [RegisterController::class, 'showFormSignup'])->name('formsignup');
    // Route xử lý tạo tài khoản
    Route::post('/signup', [RegisterController::class, 'signup'])->name('auth.signup');
    // Route lấy ra form điền email để lấy lại mật khẩu
    Route::get('/identify', [ForGetPasswordController::class, 'showFormForGet'])->name('formForget');
    // Route lấy ra form điền email để lấy lại mật khẩu
    Route::post('/identify', [ForGetPasswordController::class, 'senToEmail'])->name('auth.sentoemail');
    // Route lấy ra form điền code để lấy lại mật khẩu
    Route::get('/identify/code', [ForGetPasswordController::class, 'showFormCode'])->name('formCode');
    // Route kiêm tra mã code
    Route::post('/identify/code', [ForGetPasswordController::class, 'checkCode'])->name('auth.checkcode');
    // changepassword
    Route::post('/changepw', [ChangePasswordController::class , 'ChangePW'])->name('auth.changepw');
    // changepassword
    Route::get('/changepw', [ChangePasswordController::class , 'showFormChangePW'])->name('formChange');
    // show form reset pw
    Route::get('/resetpw', [ResetPasswordController::class , 'showFormResetPW'])->name('formRestPW');
    // xử lý reset pw
    Route::post('/resetpw', [ResetPasswordController::class , 'ResetPW'])->name('auth.resetPW');
});


Route::get('mail', function(){
    Mail::to('thetuyen16@gmail.com')-> send(new ForGetPassword);
});

Route::prefix('admin')->group(function(){
    // Route Category get
    Route::get('/category', [CategoryController::class, 'ShowFormCategory'])->name('formCategory');
    // Route Category post (add category)
    Route::post('/category', [CategoryController::class, 'addCategory'])->name('admin.addcategory');
    // Route Product get 
    Route::get('/product', [AdminProductController::class, 'showFormProduct'])->name('showFormProduct');
    Route::post('/product', [AdminProductController::class, 'addProduct'])->name('admin.addProduct');
});
Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin.home');