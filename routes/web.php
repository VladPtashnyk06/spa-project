<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralCommentController;

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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'genCom'], function () {
    Route::controller(GeneralCommentController::class)->group(function () {
        Route::get('/all', 'allComments')->name('genCom.index');
        Route::get('/show/{id}', 'show')->name('genCom.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'genCom'], function () {
        Route::controller(GeneralCommentController::class)->group(function () {
            Route::get('/my', 'index')->name('genCom.my.index');
            Route::get('/create', 'create')->name('genCom.my.create');
            Route::post('/store', 'store')->name('genCom.my.store');
            Route::get('/edit/{id}', 'edit')->name('genCom.my.edit');
            Route::post('/update/{id}', 'update')->name('genCom.my.update');
            Route::delete('/delete/{id}', 'destroy')->name('genCom.my.destroy');
        });
    });
});

require __DIR__.'/auth.php';
