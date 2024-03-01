<?php

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ProdukController;

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
    return view('home',['title'=>'Home Pages', 'active' => 'home']);
});

Route::get('/about-me', function () {
    return view('about-me', ['nama'=>'zahra', 'no_bp'=>'2101092026', 'email'=>'zahra@gmail.com', 'gambar'=>'zahr.PNG',
     'title' => 'Tentang Saya', 'active' => 'about-me']);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');//untuk menampilkan form
Route::post('/login', [LoginController::class, 'authenticate']);//memproses form
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index',['title' => 'Home']);
})->middleware('auth');//untuk proteksi


Route::get('/produk', [ProdukController::class,'index']);
Route::resource('/Produk',ProdukController::class)->except('show');

// Route::get('/no/{produk:id}', [ProdukController::class,'single']);
// Route::resource('/dashboard/category', AdminCategoryController::class)->middleware('admin')->except('show');
// Route::get('dashboard/category/checkSlug',[AdminCategoryController::class, 'checkSlug'])->middleware('auth');
// Route::resource('/dashboard/category',AdminCategoryController::class)->middleware('auth');


?>
