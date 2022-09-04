<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
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
//Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('auth.custom_login');
});
Route::view('/welcome','welcome');

Route::get('/dashboard', function () {
    return view('products.index');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->middleware(['auth'])->group(function (){
//    Route::resource('/category');
//    Route::view('/products','products.index');
    Route::resource('/products',ProductController::class);
});



Route::get('dropui', [ UploadController::class, 'upload' ]);
Route::post('upload', [ UploadController::class, 'uploadFile' ])->name('uploadFile');
Route::get('ui', [ UploadController::class, 'uiUpload' ]);
Route::post('uiUpload', [ UploadController::class, 'uiUploadFile' ])->name('uiUploadFile');
require __DIR__.'/auth.php';

