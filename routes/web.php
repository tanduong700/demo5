<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
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
    Route::prefix('/role')->name('role.')->group(function(){
        Route::get('/',[RoleController::class, 'index'])->name('index');
        Route::get('/create',[RoleController::class, 'create'])->name('create');
        Route::post('/create',[RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[RoleController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}',[RoleController::class, 'update'])->name('update');
        route::get('/delete/{id}',[RoleController::class, 'delete'])->name('delete');
    });

    // hiển thị danh sách permission và các chức năng thêm, sửa, xóa
    Route::prefix('/permission')->name('permission.')->group(function(){
        Route::get('/',[PermissionController::class, 'index'])->name('index');
        Route::get('/create',[PermissionController::class, 'create'])->name('create');
        Route::post('/create',[PermissionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[PermissionController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}',[PermissionController::class, 'update'])->name('update');
        route::get('/delete/{id}',[PermissionController::class, 'delete'])->name('delete');
    });

    Route::prefix('/role_permission')->name('role_permission.')->group(function(){
        Route::get('/',[RolePermissionController::class, 'index'])->name('index');
        //Route::get('/create',[RolePermissionController::class, 'create'])->name('create');
        //Route::post('/create',[RolePermissionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[RolePermissionController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}',[RolePermissionController::class, 'update'])->name('update');
        //route::get('/delete/{id}',[RolePermissionController::class, 'delete'])->name('delete');
    });


});
