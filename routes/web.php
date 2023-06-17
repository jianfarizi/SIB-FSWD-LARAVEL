<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleControlller;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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


Route::get('/', [LandingController::class, 'index'])->name('landing');




route::get('/user', [userController::class, 'index']); 

route::get('/create', [userController::class, 'create']); 

Route::get('/login', [LoginController::class, 'index'])->name('login'); 
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function() {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::middleware('role:admin|staf')->group(function() {

    // brand
    
    
    route::get('/brand', [BrandController::class, 'index'])->name('brand.index');  // route untuk menampilkan data awal
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create'); // route untuk menampilkan form create
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit'); // route untuk menampilkan form edit
    Route::post('/brand', [BrandController::class, 'store'])->name('brand.store'); // route untuk menyimpan data
    Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update'); // route untuk mengupdate data
    Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy'); // route untuk menghapus data
    
    
    // kategory
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('/category/{id}', [CategorytController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    
    // Slider
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index'); 
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create'); 
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store'); 
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit'); 
    Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update'); 
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); 
    
    });


    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    Route::middleware('role:admin|staff')->group(function() {
    // product
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });


     Route::middleware('role:admin')->group(function() {
    // Role
    Route::get('/role', [RoleControlller::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleControlller::class, 'create'])->name('role.create');
    Route::post('/role', [RoleControlller::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleControlller::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}', [RoleControlller::class, 'update'])->name('role.update');
    Route::delete('/role/{id}', [RoleControlller::class, 'destroy'])->name('role.destroy');
    
    // user
    
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
            Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/user', [UserController::class, 'store'])->name('user.store');
            Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

     });

});
