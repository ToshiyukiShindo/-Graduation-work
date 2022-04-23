<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;//追記
use App\Http\Controllers\PostsController;//追記
use App\Http\Controllers\SalesController;//追記
use App\Http\Controllers\FilesController;//追記
use App\Http\Controllers\BoardsController;//追記
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


Route::get('/home0', [App\Http\Controllers\HomeController::class, 'index'])->name('top0');
Route::group(['middleware' => ['auth', 'can:premier-only']], function () {
   //ここに書いたルーティングは全てプレミア会員のみアクセスできる
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('top');
});


Route::get('/generalusers', [App\Http\Controllers\HomeController::class, 'gulist'])->name('genuser');
Route::get('/generalusers0', [App\Http\Controllers\HomeController::class, 'gulist0'])->name('genuser0');
Route::get('/generalusers/upload', [App\Http\Controllers\HomeController::class, 'practice2']);
Route::post('/generalusers/upload', [App\Http\Controllers\HomeController::class, 'guup2']);
//登録処理
Route::group(['middleware' => ['auth', 'can:premier-only']], function () {
Route::post('/users',[App\Http\Controllers\HomeController::class, 'store']);
//更新画面
Route::get('/usersedit/{user}',[App\Http\Controllers\HomeController::class, 'edit']);
//更新処理
Route::post('/users/update',[App\Http\Controllers\HomeController::class, 'update']);
//ユーザーを削除
Route::delete('/user/{user}',[App\Http\Controllers\HomeController::class, 'destroy']);
});
Route::post('/users0',[App\Http\Controllers\HomeController::class, 'store0']);


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
Route::get('/salesentry0', [SalesController::class, 'index0'])->name('salesEntry0');
Route::get('/salesentry0', [SalesController::class, 'show0']);
//sales登録処理
Route::group(['middleware' => ['auth', 'can:premier-only']], function () {
Route::post('/sales',[SalesController::class, 'store']);
//sales更新画面
Route::get('/salessedit/{sales}',[SalesController::class, 'edit']);
//sales更新処理
Route::post('/sales/update',[SalesController::class, 'update']);
//salesを削除
Route::delete('/sale/{sale}',[SalesController::class, 'destroy']);
});
Route::post('/sales0',[SalesController::class, 'store0']);


//salessummary
Route::get('/salessummary', [SalesController::class, 'index2'])->name('salesSummary');
Route::get('/salessummary0', [SalesController::class, 'index20'])->name('salesSummary0');


//画像アップロード画面表示
Route::get('/files', [FilesController::class, 'index']);
//画像アップロード処理
Route::post('/files/upload',[FilesController::class, 'upload']);
//詳細画面を表示
Route::get('/filedetail/{file}',[FilesController::class, 'detail']);
//画像を削除
Route::delete('/file/{file}',[FilesController::class, 'destroy']);

//画像アップロード画面表示
Route::get('/files0', [FilesController::class, 'index0']);
//画像アップロード処理
Route::post('/files0/upload',[FilesController::class, 'upload0']);
//詳細画面を表示
Route::get('/filedetail0/{file}',[FilesController::class, 'detail0']);
//画像を削除
Route::delete('/file0/{file}',[FilesController::class, 'destroy0']);

//userにCSVをインポート
Route::get('generalusers/csv', [HomeController::class,'csvindex'])->name('csv');
Route::post('/generalusers/csv/upload', [HomeController::class,'upload']);

//salesにCSVをインポート
Route::get('salesentry/csv', [SalesController::class,'csvindex'])->name('csv');
Route::get('salesentry/csv0', [SalesController::class,'csvindex0'])->name('csv0');
Route::post('/salesentry/csv/upload', [SalesController::class,'upload']);

//fileをダウンロード
Route::get('/files/{fileid}', [FilesController::class,'filedl'])->name('file.download');
Route::get('/files0/{fileid}', [FilesController::class,'filedl0'])->name('file.download0');


//Boardsページへ接続
Route::get('/boards', [App\Http\Controllers\BoardsController::class, 'index'])->name('boards');
Route::get('/boards0', [App\Http\Controllers\BoardsController::class, 'index0'])->name('boards0');
Route::post('/boards', [App\Http\Controllers\BoardsController::class, 'store']);
Route::post('/boards0', [App\Http\Controllers\BoardsController::class, 'store0']);