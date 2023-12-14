<?php

use App\Http\Controllers\RayonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RombelController;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');


Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('dashboard');
})->name('home.page');
Route::prefix('/user')->name('user.')->group(function () {
    Route::get('/data', [UserController::class, 'data'])->name('data');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});

Route::prefix('/siswa')->name('siswa.')->group(function () {
    Route::get('/index', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
});

Route::prefix('/rayon')->name('rayon.')->group(function () {
    Route::get('/index', [RayonController::class, 'index'])->name('index');
    Route::get('/create', [RayonController::class, 'create'])->name('create');
    Route::post('/store', [RayonController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [RayonController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [RayonController::class, 'destroy'])->name('delete');
});

Route::prefix('/rombel')->name('rombel.')->group(function () {
    Route::get('/index', [RombelController::class, 'index'])->name('index');
    Route::get('/create', [RombelController::class, 'create'])->name('create');
    Route::post('/store', [RombelController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RombelController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [RombelController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [RombelController::class, 'destroy'])->name('delete');
});
