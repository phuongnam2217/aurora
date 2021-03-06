<?php

use App\Http\Controllers\ArosesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BraceletsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EarringsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NeckLacesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RingsController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/{id}/product',[HomeController::class,'detailProduct'])->name('home.detailProduct');
Route::post('/search',[HomeController::class,'search'])->name('home.search');
Route::middleware('checkCart')->prefix('/checkout')->group(function (){
    Route::get('/',[CheckOutController::class,'checkout'])->name('checkout.index');
    Route::post('/',[CheckOutController::class,'createOrder'])->name('checkout.createOrder');
});

Route::prefix('auroses-series')->group(function (){
    Route::get('{name}',[ArosesController::class,'index'])->name('auroses-series.index');
    Route::get('{name}/sort_by={sort}&order={order}&limit={value?}',[ArosesController::class,'sort'])->name('auroses-series.sort');
});

Route::prefix('cart')->group(function (){
    Route::get('/{id}/add',[CartController::class,'addtoCart'])->name('cart.add');
    Route::post('/{id}/add',[CartController::class,'addMany'])->name('cart.addMany');
    Route::get('/{id}/decrease',[CartController::class,'decrease'])->name('cart.decrease');
    Route::get('/{id}/remove',[CartController::class,'delete'])->name('cart.delete');
});

Route::get('login',[AuthController::class,'showFormLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');
Route::middleware(['auth','checkAccount'])->prefix('admin')->group(function (){
    Route::get('/',[DashBoardController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
    Route::get('/info',[DashBoardController::class,'info'])->name('admin.info');
    Route::post('/updateInfo/{id}',[DashBoardController::class,'update'])->name('admin.update');
    Route::get('password',[DashBoardController::class,'password'])->name('admin.password');
    Route::post('/updatePassword',[DashBoardController::class,'changePassword'])->name('admin.updatePassword');
    Route::get('avatar',[DashBoardController::class,'avatar'])->name('admin.avatar');
    Route::post('/updateAvatar',[DashBoardController::class,'changeAvatar'])->name('admin.updateAvatar');
//User
    Route::prefix('/users')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::post('/store',[UserController::class,'store'])->name('users.store');
        Route::get('/{id}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::get('/{id}/delete',[UserController::class,'destroy'])->name('users.destroy');
        Route::get('/{id}/status',[UserController::class,'changeStatus'])->name('users.changeStatus');
        Route::post('/{id}/update',[UserController::class,'update'])->name('users.update');
    });
    //Category
    Route::prefix('/categories')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('categories.index');
        Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
        Route::get('/{id}/delete',[CategoryController::class,'destroy'])->name('categories.destroy');
//        Route::get('/{id}/status',[CategoryController::class,'changeStatus'])->name('users.changeStatus');
        Route::post('/{id}/update',[CategoryController::class,'update'])->name('categories.update');
    });

//    Products
    Route::prefix('/products')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('products.index');
        Route::get('/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/store',[ProductController::class,'store'])->name('products.store');
        Route::get('/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
        Route::get('/{id}/delete',[ProductController::class,'destroy'])->name('products.destroy');
        Route::post('/{id}/update',[ProductController::class,'update'])->name('products.update');
        Route::get('/{id}/image',[ProductController::class,'image'])->name('products.image');
        Route::post('/{id}/upload',[ProductController::class,'upload'])->name('products.upload');
        Route::get('/{id}/{image_id}/remove',[ProductController::class,'removeImage'])->name('products.removeImage');
        Route::get('/{id}/changeStatus',[ProductController::class,'changeStatus'])->name('products.changeStatus');
    });

//    Order & Order Details
    Route::prefix('/orders')->group(function (){
        Route::get('/{id}',[OrderController::class,'index'])->name('orders.index');
        Route::get('/{id}/show',[OrderController::class,'show'])->name('orders.show');
        Route::get('/{id}/print_order',[OrderController::class,'print_order'])->name('orders.print');
        Route::get('/{id}/confirmed',[OrderController::class,'confirmed'])->name('orders.confirmed');
        Route::get('/{id}/cancel',[OrderController::class,'cancelOrder'])->name('orders.cancel');
    });

//    Customers
    Route::prefix('/customers')->group(function (){
        Route::get('/',[CustomerController::class,'index'])->name('customers.index');
    });
});


