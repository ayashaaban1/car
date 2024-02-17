<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[MainController::class,'index'])->name('index');
Route::get('listing',[MainController::class,'listing'])->name('listing');
Route::get('testimonials',[MainController::class,'testimonials'])->name('testimonials');
Route::get('blog',[MainController::class,'blog'])->name('blog');
Route::get('about',[MainController::class,'about'])->name('about');
Route::get('contact',[MainController::class,'contact'])->name('contact');
Route::post('send-mail', [ContactController::class, 'store'])->name('send-mail');
Route::get('single/{id}',[MainController::class,'single'])->name('single');

Route::fallback(MainController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
