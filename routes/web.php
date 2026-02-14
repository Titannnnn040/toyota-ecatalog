<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\carCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('/admin/logout', [AdminAuthController::class, 'logout']);
    
    Route::get('/admin/cars', [CarsController::class, 'index'])->name('cars.index');
    Route::get('/admin/cars/create', [CarsController::class, 'create'])->name('cars.create');
    Route::post('/admin/cars/create', [CarsController::class, 'store'])->name('cars.store');
    Route::get('/admin/cars/edit/{id}', [CarsController::class, 'edit'])->name('cars.edit');
    Route::put('/admin/cars/update/{id}', [CarsController::class, 'update'])->name('cars.update');
    Route::delete('/admin/cars/delete/{id}', [CarsController::class, 'destroy'])->name('cars.destroy');
    
    Route::get('/admin/rating', [RatingController::class, 'index'])->name('rating.index');
    Route::get('/admin/rating/create', [RatingController::class, 'create'])->name('rating.create');
    Route::post('/admin/rating/create', [RatingController::class, 'store'])->name('rating.store');
    Route::get('/admin/rating/edit/{id}', [RatingController::class, 'edit'])->name('rating.edit');
    Route::put('/admin/rating/update/{id}', [RatingController::class, 'update'])->name('rating.update');
    Route::delete('/admin/rating/delete/{id}', [RatingController::class, 'destroy'])->name('rating.destroy');
    
    Route::get('/admin/car-category', [carCategoryController::class, 'index'])->name('carCategory.index');
    Route::get('/admin/car-category/create', [carCategoryController::class, 'create'])->name('carCategory.create');
    Route::post('/admin/car-category/create', [carCategoryController::class, 'store'])->name('carCategory.store');
    Route::get('/admin/car-category/edit/{id}', [carCategoryController::class, 'edit'])->name('carCategory.edit');
    Route::put('/admin/car-category/update/{id}', [carCategoryController::class, 'update'])->name('carCategory.update');
    Route::delete('/admin/car-category/delete/{id}', [carCategoryController::class, 'destroy'])->name('carCategory.destroy');

    Route::get('/admin/setting/', [HomeController::class, 'indexAdmin'])->name('settings.index');
    Route::get('/admin/setting/edit/{id}', [HomeController::class, 'editAdmin'])->name('settings.edit');
    Route::put('/admin/setting/update/{id}', [HomeController::class, 'updateAdmin'])->name('settings.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
