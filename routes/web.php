<?php

use App\Http\Controllers\LateController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\Dashboard;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Route;


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



Route::middleware('IsGuest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('IsLogin')->group(function () {
    Route::get('/dashboard/admin', [Dashboard::class, 'index'])->name('admin.index');

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
        Route::get('/edit{id}', [StudentController::class, 'edit'])->name('edit');
        Route::patch('/update{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/delete{id}', [StudentController::class, 'destroy'])->name('delete');
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

    Route::prefix('/late')->name('telat.')->group(function () {
        Route::get('/index', [LateController::class, 'index'])->name('index');
        Route::get('/create', [LateController::class, 'create'])->name('create');
        Route::post('/img', [LateController::class, 'uploadImage'])->name('upload');
        Route::post('/store', [LateController::class, 'store'])->name('store');
        Route::get('/show/{student_id}', [LateController::class, 'show'])->name('show');
        Route::get('/download/{student_id}', [LateController::class, 'downloadPDF'])->name('download');
        Route::get('/excel', [LateController::class, 'exportExcel'])->name('excel');
        Route::get('/edit/{id}', [LateController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LateController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LateController::class, 'destroy'])->name('delete');
    });


    Route::middleware('IsPs')->group(function () {
        Route::get('/dashboard/ps', [Dashboard::class, 'indexPS'])->name('ps.index');
        Route::get('/siswa/rayon', [StudentController::class, 'data'])->name('ps.siswa');
        Route::get('data/siswa/rayon', [LateController::class, 'data'])->name('ps.telat');
        Route::get('/download/{student_id}', [LateController::class, 'downloadPDF'])->name('download');
        Route::get('/excel', [LateController::class, 'exportExcel'])->name('excel');
        Route::get('/show/{student_id}', [LateController::class, 'show'])->name('show');
        Route::get('/excelPs', [LateController::class, 'exportExcel'])->name('excelPs');


        Route::get('/ps-error', function () {
            return view('errors.permission');
        })->name('ps.error');

        Route::get('/{any?}', function () {
            abort(403, 'Unauthorized action.');
        })->where('any', '.*')->name('ps.unauthorized');
    });
});
