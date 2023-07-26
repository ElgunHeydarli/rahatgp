<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\GoogleController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ProductController;
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

Route::get('/register', fn () => view('front.account.register'))->name('register');
Route::get('/login', fn () => view('front.account.login'))->name('login');
Route::get('/resend-code', fn () => view('front.account.resend_mail'))->name('resend_mail');
Route::post('/register', [AccountController::class, 'register']);
Route::post('/login', [AccountController::class, 'login']);
Route::post('/resend-code', [AccountController::class, 'resend_email']);
Route::get('/activate-user/{token}', [AccountController::class, 'activate_user'])->name('activate-user');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update_profile']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/mehsullar/{slug?}', [ProductController::class, 'index'])->name('products');
Route::get('/mehsul/{slug}', [ProductController::class, 'detail'])->name('product-detail');
Route::get('/add-to-cart/{id}', [ProductController::class, 'add_to_cart']);
Route::get('/remove-from-basket', [ProductController::class, 'remove_from_basket']);
Route::get('/add-to-favorite/{id}', [ProductController::class, 'add_to_favorite']);
Route::get('/mehsulu-al', [OrderController::class, 'sale'])->name('buy');
Route::post('/mehsulu-al', [OrderController::class, 'buy']);
Route::post('/search', [HomeController::class, 'search'])->name('search-product');
Route::get('/basket', [CartController::class, 'basket'])->name('basket');
Route::get('/favorites', [CartController::class, 'favorite'])->name('favorite');
Route::get('/haqqimizda',[\App\Http\Controllers\Front\AboutController::class,'about'])->name('about');
Route::get('/elaqe',[\App\Http\Controllers\Front\ContactController::class,'contact'])->name('contact');

Route::get('/admin/login', fn () => view('admin.account.login'))->name('admin.login');
Route::post('/admin/login', [AdminAccountController::class, 'login']);

Route::prefix('admin')->middleware('role:admin|superadmin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('color')->group(function () {
        Route::get('/', [ColorController::class, 'index'])->name('colors');
        Route::get('/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/create', [ColorController::class, 'store']);
        Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('/edit/{id}', [ColorController::class, 'update']);
        Route::get('/delete/{id}', [ColorController::class, 'destroy'])->name('color.delete');
    });

    Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class,'index'])->name('admin.about');
    Route::post('/about/update',[\App\Http\Controllers\Admin\AboutController::class,'update'])->name('admin.about.update');

    Route::get('/contact',[\App\Http\Controllers\Admin\ContactController::class,'index'])->name('admin.contact');
    Route::post('/contact/update',[\App\Http\Controllers\Admin\ContactController::class,'update'])->name('admin.contact.update');

    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.products');
        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [AdminProductController::class, 'store']);
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [AdminProductController::class, 'update']);
        Route::get('/delete/{id}', [AdminProductController::class, 'destroy'])->name('admin.product.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update']);
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders');
        Route::get('/detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order.detail');
        Route::get('/change-status/{id}', [AdminOrderController::class, 'change_status'])->name('admin.order.change-status');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/{id}', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });
});
