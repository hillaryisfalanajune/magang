<?php

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Category;

use App\Models\Golongan2021;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Barang2021Controller;
use App\Http\Controllers\Penduduk2021Controller;
use App\Http\Controllers\Pekerja2021Controller;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;


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
    return view('home',['title'=>'Home  Pages', 'active' => 'home']);
});

Route::get('/about-me', function () {
    return view('about-me', ['nama'=>'Sonya', 'no_bp'=>'2101092021', 'email'=>'sonyahasnahafizah@gmail.com', 'gambar'=>'pic-sonya-hafizah.PNG',
     'title' => 'Tentang Saya', 'active' => 'about-me']);
});

Route::get('/post',[PostController::class,'index']);
Route::get('/post/{post:slug}', [PostController::class,'single']);

//tugas
Route::get('/mahasiswa', [MahasiswaController::class,'index']);
Route::get('/pekerja2021', [Pekerja2021Controller::class,'index']);
Route::get('/mhs/{mahasiswa:Nim}', [MahasiswaController::class,'single']);

Route::get('/post/categories/{category:slug}', function(Category $category){
    return view('post.index',[
        'title'=>'Category '.$category->name,'active'=>'post',
        'category' => $category->name,
        'data_posts'=>$category->posts->load(['author','category'])

    ]);
});

Route::get('/post/users/{user:username}', function(User $user){
    return view('post.index',[
        'title'=>'Author'.$user->name,'active'=>'post',
        'author' => $user->name,
        'data_posts'=>$user->posts->load(['author','category'])
    ]);
});


Route::get('/mahasiswa/jurusans/{jurusan:slug}', function(Jurusan $jurusan){
    return view('mahasiswa.jurusans',['title'=>'Jurusan '.$jurusan->nama_jurusan,
    'active'=>'mahasiswa', 'data_mahasiswa'=>$jurusan->mahasiswas]);
});

Route::get('/pekerja2021/golongan2021s/{golongan2021:slug}', function(Golongan2021 $golongan2021){
    return view('pekerja2021.golongan2021s',['title'=>'Golongan2021 '.$golongan2021->slug,
    'active'=>'pekerja2021', 'data_pekerja2021'=>$golongan2021->pekerja2021s]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');//untuk menampilkan form
Route::post('/login', [LoginController::class, 'authenticate']);//memproses form
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index',['title' => 'Home']);
})->middleware('auth');//untuk proteksi

Route::get('dashboard/post/checkSlug',[DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/post',DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/category', AdminCategoryController::class)->middleware('admin')->except('show');

Route::get('dashboard/category/checkSlug',[AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/category',AdminCategoryController::class)->middleware('auth');

//Route::resource('/dashboard/2021',Dashboard2021Controller::class)->middleware('auth');
Route::resource('/dashboard/barang2021',Barang2021Controller::class)->except('show');
//Route::get('/dashboard/barang2021', [Barang2021Controller::class,'index']);

//Route::resource('/dashboard/barang2021',DashboardBarangController::class)->except('show');

Route::resource('/dashboard/penduduk2021',Penduduk2021Controller::class)->middleware('auth')->except('show');
?>
