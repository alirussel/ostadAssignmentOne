<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyController;

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

/*Route::get('/', function () {
    return response("Welcome to Collection APP",200);
})->middleware(['verify.shopify'])->name('welcome');*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'shopIndex'])
    ->middleware(['verify.shopify'])
    ->name('shop');


Route::get('/collections', [\App\Http\Controllers\CollectionsController::class, 'collectionsIndex'])
        ->middleware(['verify.shopify'])
        ->name('collections.index');

Route::post('/collections', [\App\Http\Controllers\CollectionsController::class, 'collectionsIndex'])
    ->middleware(['verify.shopify'])
    ->name('collections.save');

Route::get('/products/{collectionid}', [\App\Http\Controllers\ProductsController::class, 'products'])
    ->middleware(['verify.shopify'])
    ->name('collections.products');

Route::post('/products/{collectionid}', [\App\Http\Controllers\ProductsController::class, 'products'])
    ->middleware(['verify.shopify'])
    ->name('collections.products.save');


