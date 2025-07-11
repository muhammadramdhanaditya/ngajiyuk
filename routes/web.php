<?php

use App\Livewire\Login\Login;
use App\Livewire\Login\Register;
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

Route::get('/', function () {
    return view('dashboard.landing');
})->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');
Route::get('/info', [App\Http\Controllers\InfoController::class, 'index'])->name('info');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
