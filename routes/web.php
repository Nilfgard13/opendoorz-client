<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RotatorController;
use App\Http\Controllers\PropertyController;

//User Route
Route::get('/', function () {
    return view('index',);
});

Route::get('/login', function () {
    return view(view: 'auth/login',);
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view(view: 'auth/register',);
});

Route::get('/about', function () {
    return view('user/about', ['title' => 'About', 'header' => 'About', 'breadcrumbs' => 'About']);
});

Route::get('/services', function () {
    return view('user/services', ['title' => 'Services', 'header' => 'Services', 'breadcrumbs' => 'Services']);
});

Route::get('/properties', function () {
    return view('user/properties', ['title' => 'Properties', 'header' => 'Properties', 'breadcrumbs' => 'Properties']);
});
Route::get('/blog', function () {
    return view('user/blog', ['title' => 'Blog', 'header' => 'Blog', 'breadcrumbs' => 'Blog']);
});
Route::get('/contact', function () {
    return view('user/contact', ['title' => 'Contact', 'header' => 'Contact', 'breadcrumbs' => 'Contact']);
});

//Admin Route
Route::get('/admin', function () {
    return view('admin/dashboard', ['title' => 'Dashboard']);
});

//property route
Route::get('/admin-property', [PropertyController::class, 'index'])->name('product.index');
Route::post('/admin-property/store', [PropertyController::class, 'store'])->name('product.store');
Route::get('/admin-property/search', [PropertyController::class, 'search'])->name('products.search');


//user route
Route::get('/admin-user', function () {
    return view('admin/user', ['title' => 'Management User']);
});
Route::get('/admin-user', [UserController::class, 'index'])->name('user.index');
Route::post('/admin-user/create', [UserController::class, 'store'])->name('user.store');
Route::put('/admin-user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/admin-user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/admin-user/search', [UserController::class, 'show'])->name('user.show');


//rotator route
Route::get('/admin-review', function () {
    return view('admin/review', ['title' => 'Management Review']);
});

Route::get('/admin-rotator', function () {
    return view('admin/rotator', ['title' => 'Management Rotator']);
});
Route::get('/admin-rotator', [RotatorController::class, 'index'])->name('rotator.index');

Route::get('/admin-blog', function () {
    return view('admin/blog', ['title' => 'Management Blog']);
});

Route::get('/admin-profile', function () {
    return view('admin/profile', ['title' => 'Management Blog']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');