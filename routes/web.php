<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\CategoryArmadaController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/armada', function () {
    return view('armada');
});
Route::get('/tentang-kami', function () {
    return view('about');
});

Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);
Route::post('/admin/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware('auth');

Route::middleware('auth')->group(function() {
    // Armada Routes
    Route::get('/dashboard/armada', [ArmadaController::class, 'index']);
    Route::get('/dashboard/armada/create', [ArmadaController::class, 'create']);
    Route::post('/dashboard/armada', [ArmadaController::class, 'store']);
    Route::get('/dashboard/armada/{armada:slug}', [ArmadaController::class, 'show']);
    Route::get('/dashboard/armada/{armada:slug}/edit', [ArmadaController::class, 'edit']);
    Route::put('/dashboard/armada/{armada:slug}', [ArmadaController::class, 'update']);
    Route::delete('/dashboard/armada/{armada:slug}', [ArmadaController::class, 'destroy']);

    // Category Armada Routes
    Route::get('/dashboard/category-armada/checkSlug', [CategoryArmadaController::class, 'checkSlug']);
    Route::get('/dashboard/category-armada', [CategoryArmadaController::class, 'index']);
    Route::get('/dashboard/category-armada/create', [CategoryArmadaController::class, 'create']);
    Route::post('/dashboard/category-armada', [CategoryArmadaController::class, 'store']);
    Route::get('/dashboard/category-armada/{category:slug}', [CategoryArmadaController::class, 'show']);
    Route::get('/dashboard/category-armada/{category:slug}/edit', [CategoryArmadaController::class, 'edit']);
    Route::put('/dashboard/category-armada/{category:slug}', [CategoryArmadaController::class, 'update']);
    Route::delete('/dashboard/category-armada/{category:slug}', [CategoryArmadaController::class, 'destroy']);
});

