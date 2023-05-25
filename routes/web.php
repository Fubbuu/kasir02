<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\EditController;

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
// Route::get('/home', function () {
//     return view('home');
// });


// LOGIN
route::get('/login',[AuthController::class,'index'])->name('login');
route::post('/postlogin',[AuthController::class,'postlogin'])->name('postlogin');
route::get('/logout',[AuthController::class,'logout'])->name('logout');

// CRUD DATA USER
Route::group(['middleware'=> ['auth','checkrole:admin']], function (){
    route::get('/user',[UserController::class,'index']);
    route::post('/user/store',[UserController::class,'store']);
    route::post('/user/update/{id}',[UserController::class,'update']);
    route::get('/user/destroy/{id}',[UserController::class,'destroy']);

    // CRUD DATA JENIS BARANG 
    route::get('/jenisbarang',[JenisBarangController::class,'index']);
    route::post('/jenisbarang/store',[JenisBarangController::class,'store']);
    route::post('/jenisbarang/update/{id}',[JenisBarangController::class,'update']);
    route::get('/jenisbarang/destroy/{id}',[JenisBarangController::class,'destroy']);
    
    // CRUD DATA BARANG 
    route::get('/barang',[BarangController::class,'index']);
    route::post('/barang/store',[BarangController::class,'store']);
    route::post('/barang/update/{id}',[BarangController::class,'update']);
    route::get('/barang/destroy/{id}',[BarangController::class,'destroy']);
 
     // CRUD DISKON
     route::get('/setdiskon',[DiskonController::class,'index']);
     route::post('/setdiskon/update/{id}',[DiskonController::class,'update']);

       // EDIT DATA USER 
     route::get('/user/edit',[EditController::class,'index']);
     route::post('/user/edit/update/{id}',[EditController::class,'update']);
 
    
 

});
Route::group(['middleware'=> ['auth','checkrole:admin,kasir']], function (){
    route::get('/home',[HomeController::class,'index'])->name('home');
});