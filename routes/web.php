<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;//追記
use App\Http\Controllers\PostsController;//追記
use App\Http\Controllers\SalesController;//追記
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\StoresController;//

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('top');
Route::get('/top', [App\Http\Controllers\HomeController::class, 'index2'])->name('top');


Route::get('/generalusers', [App\Http\Controllers\HomeController::class, 'gulist'])->name('genuser');
Route::get('/generalusers/upload', [App\Http\Controllers\HomeController::class, 'practice2']);
Route::post('/generalusers/upload', [App\Http\Controllers\HomeController::class, 'guup2']);
//登録処理
Route::post('/users',[App\Http\Controllers\HomeController::class, 'store']);
//更新画面
Route::get('/usersedit/{users}',[App\Http\Controllers\HomeController::class, 'edit']);
//更新処理
Route::post('/users/update',[App\Http\Controllers\HomeController::class, 'update']);
//ユーザーを削除
Route::delete('/user/{user}',[App\Http\Controllers\HomeController::class, 'destroy']);


Route::get('/systemusers', [App\Http\Controllers\HomeController::class, 'syslist'])->name('sysuser');


Route::get('/post', [PostsController::class, 'index']);
Route::post('posts', [PostsController::class, 'store']);


 // 店舗の表示
Route::get('/stores', [StoresController::class, 'index']);
//登録処理
Route::post('/stores',[StoresController::class, 'store']);
//更新画面
Route::get('/storesedit/{stores}',[StoresController::class, 'edit']);
//更新処理
Route::post('/stores/update',[StoresController::class, 'update']);
//本を削除
Route::delete('/store/{store}',[StoresController::class, 'destroy']);

Route::get('/salesentry', [SalesController::class, 'index'])->name('salesEntry');
Route::get('/salesentry', [SalesController::class, 'show']);
//sales登録処理
Route::post('/sales',[SalesController::class, 'store']);
//sales更新画面
Route::get('/salessedit/{sales}',[SalesController::class, 'edit']);
//sales更新処理
Route::post('/sales/update',[SalesController::class, 'update']);
//salesを削除
Route::delete('/sale/{sale}',[SalesController::class, 'destroy']);