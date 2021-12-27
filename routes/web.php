<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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

Route::GET('/', [ItemController::class, 'index'])->name('home');
ROUTE::POST('/', [CartController::class, 'create']);
Route::POST('/logout', [UserController::class, 'logout']);



Route::GET('/login', function(){
    return view('login');
})->middleware('guest');

Route::POST('/login', [UserController::class, 'login']);



Route::GET('/register', function(){
    return view('register');
})->middleware('guest');
Route::POST('/register', [UserController::class, 'register']);



Route::GET('/profile', function(){
    return view('profile');
})->middleware('auth');

Route::GET('/profile/{users:name}/update', function(){
    return view('updateProfile');
})->middleware('auth');

Route::POST('/profile/{users:name}/update', [UserController::class, 'update']);




Route::GET('/view', [ItemController::class, 'find']);



Route::GET('/addFurniture', [ItemController::class, 'displayInsert'])->middleware('auth');

Route::POST('/addFurniture', [ItemController::class, 'addFurniture'])->middleware('auth');


Route::GET('/updateFurniture/{items:name}', [ItemController::class, 'displayUpdate'])->middleware('auth');

Route::POST('/updateFurniture/{items:name}', [ItemController::class, 'updateFurniture'])->middleware('auth');

Route::GET('/deleteFurniture/{items:name}', [ItemController::class, 'deleteFurniture'])->middleware('auth');

Route::GET('/detail/{items:name}', [ItemController::class, 'displayDetail']);






Route::GET('/cart', [CartController::class, 'index'])->middleware('auth');


Route::GET('/add-to-cart/{item:id}', [CartController::class, 'create'])->middleware('auth');
Route::GET('/remove-from-cart/{item:id}', [CartController::class, 'remove_item'])->middleware('auth');
// Route::GET('/store-to-cart', [CartController::class, 'store']);



Route::GET('/checkout', function(){
    return view('checkout');
})->middleware('auth');
Route::POST('/checkout', [TransactionController::class, 'store'])->middleware('auth');



Route::GET('/transaction', [TransactionController::class, 'index']);








