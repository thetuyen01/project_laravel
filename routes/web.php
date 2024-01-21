<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\BlogImageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForGetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Chat\ChatMessageController;
use App\Http\Controllers\Clients\CartDetailController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\ProfileUserController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Clients\OrderController;
use App\Mail\ForGetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    // Route active account
    Route::post('/active', [RegisterController::class, 'checkActive'])->name('auth.active');
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

Route::prefix('admin')->middleware('is_admin','auth')->group(function(){
    Route::get('home', [AdminHomeController::class, 'menu'])->name('admin.home');
    // Route User 
    Route::prefix('user')->group(function(){
        Route::get('', [UserAdminController::class, 'get_list_users'])->name('admin.list_user');
        Route::post('add', [UserAdminController::class, 'add_user'])->name('admin.add_user');
        Route::get('edit/{id}', [UserAdminController::class, 'show_edit'])->name('admin.edit_user');
        Route::put('edit/{id}', [UserAdminController::class, 'update'])->name('admin.update_user');
        Route::delete('delete/{id}', [UserAdminController::class, 'delete'])->name('admin.delete_user');
    });
    // Route Category get
    Route::prefix('category')->group(function(){
        Route::get('', [CategoryController::class, 'ShowFormCategory'])->name('admin.category.formCategory');
        Route::post('add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        Route::get('edit/{id}', [CategoryController::class, 'showFormEditCategory'])->name('admin.category.formeditcategory');
        Route::put('edit/{id}', [CategoryController::class, 'updateCategory'])->name('admin.category.update');
        Route::delete('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    });
    
    // Route Product get 
    Route::prefix('product')->group(function(){
        Route::get('', [AdminProductController::class, 'showFormProduct'])->name('admin.product.list');
        Route::post('/add', [AdminProductController::class, 'addProduct'])->name('admin.product.add');
        Route::get('edit/{id}', [AdminProductController::class, 'showFormEditProduct'])->name('admin.product.edit');
        Route::put('edit/{id}', [AdminProductController::class, 'updateProduct'])->name('admin.product.update');
        Route::delete('edit/{id}', [AdminProductController::class, 'deleteProduct'])->name('admin.product.delete');
    });
    
    // Route Brand
    Route::prefix('brand')->group(function(){
        Route::get('', [BrandController::class, 'showFormBrand'])->name('formBrand');
        Route::post('add', [BrandController::class, 'addBrand'])->name('admin.addBrand');
        Route::get('edit/{id}', [BrandController::class, 'showFormedit'])->name('showFormedit');
        Route::put('edit/{id}', [BrandController::class, 'updateBrand'])->name('admin.updateBrand');
        Route::delete('delete/{id}', [BrandController::class, 'deleteBrand'])->name('admin.deleteBrand');                
    });

    // invoice
    Route::prefix('invoice')->group(function(){
        Route::get('', [OrdersController::class, 'getListOrder'])->name('admin.invoice.getListOrder');
        Route::put('edit/{id}', [OrdersController::class, 'editInvoice'])->name('admin.invoice.editInvoice');
        Route::get('detail/{id}', [OrdersController::class, 'detail_invoice'])->name('admin.invoice.detailincoice');
    });
    
    // blog Image addblogImage
    Route::prefix('image')->group(function(){
        Route::get('', [BlogImageController::class, 'showFormadd'])->name('showformbogimage');
        Route::post('add', [BlogImageController::class, 'addImageBlog'])->name('admin.add.blogImage');
        Route::get('edit/{id}', [BlogImageController::class, 'show_form_edit'])->name('admin.edit.blogImage');
        Route::put('edit/{id}', [BlogImageController::class, 'update'])->name('admin.edit.updateimage');
        Route::delete('delete/{id}', [BlogImageController::class, 'delete'])->name('admin.edit.deleteimage');
    });
    
});

// profile
Route::prefix('profile')->middleware('auth')->group(function(){
    Route::get('', [ProfileUserController::class, 'ShowProfile'])->name('profile');
    Route::put('edit', [ProfileUserController::class, 'UpdateProfileUser'])->name('updateProdile');
});


//cart
Route::prefix('cart')->middleware('auth')->group(function(){
    Route::get('', [CartController::class, 'getCart'])->name('getCart');
    Route::post('/updatequantity', [CartDetailController::class, 'updateQuantity'])->name('updateQuantity');
    Route::post('/deletecartdetai', [CartDetailController::class, 'deleteProdcutCart'])->name('deleteProdcutCart');
    Route::post('/addCartDetail', [CartDetailController::class, 'addCartDetail'])->name('addCartDetail');
});

// checkout
Route::prefix('checkout')->middleware('auth')->group(function(){
    Route::get('', [CheckoutController::class, 'getCheckout'])->name('getCheckout');
    Route::post('add', [CheckoutController::class, 'addInvoice'])->name('addInvoice');
});

// orders
Route::get('/order', [OrderController::class, 'getOrders'])->name('getOrders');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('news', function(){
    return view('client.new');
})->name('news');
Route::get('/{slug}', [ProductController::class, 'showAllProductsInCategory'])->name('showAllProductsInCategory');
Route::get('/{slug_category}/{slug_product}', [ProductController::class, 'detailProducts'])->name('detailProduct');