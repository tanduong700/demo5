<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// tài khoản phải xác thực email (verified) mới đc dùng
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    // tất cả các route mới bỏ vào đây

    // hiển thị danh sách user và các chức năng thêm, sửa, xóa
    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/',[UserController::class, 'index'])->name('index');
        Route::get('/create',[UserController::class, 'create'])->name('create');
        Route::post('/create',[UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[UserController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}',[UserController::class, 'update'])->name('update');
        route::get('/delete/{id}',[UserController::class, 'delete'])->name('delete');
    });


    // hiển thị danh sách role và các chức năng thêm, sửa, xóa

    // hiển thị danh sách permission và các chức năng thêm, sửa, xóa
});
