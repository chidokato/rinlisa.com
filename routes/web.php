<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;

use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\WardController;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeEnController;
use App\Http\Controllers\HomeCnController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::get('admin', [LoginController::class, 'index'])->name('login');
Route::post('admin', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// ajax
Route::group(['prefix'=>'ajax'],function(){
    Route::get('change_cate_lang/{id}', [AjaxController::class, 'change_cate_lang']);
    Route::get('change_province/{id}', [AjaxController::class, 'change_province']);
    Route::get('change_province_lang/{id}', [AjaxController::class, 'change_province_lang']);
    Route::get('change_district/{id}', [AjaxController::class, 'change_district']);
    Route::get('change_district_lang/{id}', [AjaxController::class, 'change_district_lang']);
    Route::get('change_ward_lang/{id}', [AjaxController::class, 'change_ward_lang']);
    Route::get('change_SortBy/{id}', [AjaxController::class, 'change_SortBy']);
    Route::get('change_parent/{id}', [AjaxController::class, 'change_parent']);
    Route::get('update_category_view/{id}/{view}', [AjaxController::class, 'update_category_view']);
    Route::get('update_menu_view/{id}/{view}', [AjaxController::class, 'update_menu_view']);
    Route::get('del_img_detail/{id}', [AjaxController::class, 'del_img_detail']);
    Route::get('del_section/{id}', [AjaxController::class, 'del_section']);
    Route::get('update_status_category/{id}/{status}', [AjaxController::class, 'update_status_category']);
    Route::get('update_status_post/{id}/{status}', [AjaxController::class, 'update_status_post']);
    Route::get('update_hot_post/{id}/{hot}', [AjaxController::class, 'update_hot_post']);
    Route::get('change_category/{id}', [AjaxController::class, 'change_category']);
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // main
        Route::get('main', [MainController::class, 'index'])->name('admin');

        Route::resource('province',ProvinceController::class);
        Route::resource('district',DistrictController::class);
        Route::resource('ward',WardController::class);

        Route::resource('menu',MenuController::class);
        Route::resource('category',CategoryController::class);

        Route::resource('option',OptionController::class);
        Route::get('option/double/{id}', [OptionController::class, 'double']);

        Route::resource('post',PostController::class);

        Route::resource('product',ProductController::class);
        Route::resource('customer',CustomerController::class);

        Route::resource('setting',SettingController::class);
        Route::resource('slider',SliderController::class);

        Route::resource('users',UserController::class);

        Route::group(['prefix'=>'section'],function(){
            Route::get('index/{pid}', [SectionController::class, 'index']);
        });
    });
});

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// add to cart
Route::prefix('product')->group(function () {
    Route::get('add-to-cart/{id}', [HomeController::class, 'addTocart'])->name('addTocart'); // thêm sản phẩm vào giỏ hàng
    Route::get('showCart', [HomeController::class, 'showCart'])->name('showCart'); // show giỏ hàng
    Route::POST('updateCart', [HomeController::class, 'updateCart'])->name('updateCart'); // update giỏ hàng
    Route::get('delCart', [HomeController::class, 'delCart'])->name('delCart'); // delete sản phẩm trong giỏ hàng
    Route::get('checkout/{uid}', [HomeController::class, 'checkout'])->name('checkout'); // thanh toán
});

// account
Route::get('dangnhap', [HomeController::class, 'dangnhap'])->name('dangnhap');
Route::get('dangky', [HomeController::class, 'dangky'])->name('dangky');
Route::get('account', [HomeController::class, 'account'])->name('account');

Route::post('dangky', [HomeController::class, 'dangky']);
// Route::get('about', [HomeController::class, 'about'])->name('about');
// Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('{slug}', [HomeController::class, 'category']);
Route::get('{catslug}/{slug}', [HomeController::class, 'post']);
