<?php

use App\Livewire\Login\Login;
use App\Livewire\Login\Register;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin-profile');
    Route::get('/location', [App\Http\Controllers\AdminController::class, 'location'])->name('admin-location');
    Route::get('/location/add', [App\Http\Controllers\AdminController::class, 'addLocation'])->name('admin-location-add');
    Route::get('/location/edit/{id}', [App\Http\Controllers\AdminController::class, 'editLocation'])->name('admin-location-edit');
    Route::get('/teacher', [App\Http\Controllers\AdminController::class, 'teacher'])->name('admin-teacher');
    Route::get('/teacher/add', [App\Http\Controllers\AdminController::class, 'addTeacher'])->name('admin-teacher-add');
    Route::get('/teacher/edit/{id}', [App\Http\Controllers\AdminController::class, 'editTeacher'])->name('admin-teacher-edit');
    Route::get('/class', [App\Http\Controllers\AdminController::class, 'class'])->name('admin-class');
    Route::get('/class/add', [App\Http\Controllers\AdminController::class, 'addClass'])->name('admin-class-add');
    Route::get('/class/edit/{id}', [App\Http\Controllers\AdminController::class, 'editClass'])->name('admin-class-edit');
    Route::get('/user', [App\Http\Controllers\AdminController::class, 'user'])->name('admin-user');
    Route::get('/gallery', [App\Http\Controllers\AdminController::class, 'gallery'])->name('admin-gallery');
    Route::get('/gallery/add', [App\Http\Controllers\AdminController::class, 'addGallery'])->name('admin-gallery-add');
    Route::get('/gallery/edit/{id}', [App\Http\Controllers\AdminController::class, 'editGallery'])->name('admin-gallery-edit');
    Route::get('/contact', [App\Http\Controllers\AdminController::class, 'contact'])->name('admin-contact');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda berhasil logout');
    })->name('logout');
});
