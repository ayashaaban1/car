<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;

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

Route::group(['prefix' => 'admin'],function () {
    Auth::routes(['verify'=>true]);
    });

Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'verified'],function(){
    Route::group(['prefix'=>'user','as'=>'user.','controller'=>UserController::class],function(){
        Route::get('/','index')->name('list');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::put('updata/{id}','update')->name('update');
    });
    Route::group(['prefix'=>'testimonial','as'=>'testimonial.','controller'=>TestimonialController::class],function(){
        Route::get('/','index')->name('list');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::put('updata/{id}','update')->name('update');
        Route::get('delete/{id}','destroy')->name('delete');
    });
    Route::group(['prefix'=>'category','as'=>'category.','controller'=>CategoryController::class],function(){
        Route::get('/','index')->name('list');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::put('updata/{id}','update')->name('update');
        Route::get('delete/{id}','destroy')->name('delete');
    });
    Route::group(['prefix'=>'car','as'=>'car.','controller'=>CarController::class],function(){
        Route::get('/','index')->name('list');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::put('updata/{id}','update')->name('update');
        Route::get('delete/{id}','destroy')->name('delete');
    });
    Route::group(['prefix'=>'contact','as'=>'contact.','controller'=>ContactController::class],function(){
        Route::get('/','index')->name('list');
        Route::get('show/{id}','show')->name('show');
        Route::get('delete/{id}','destroy')->name('delete');
    });
});

