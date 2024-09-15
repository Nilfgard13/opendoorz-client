<?php

use Illuminate\Support\Facades\Route;

//User Route
Route::get('/', function () {
    return view('index',);
});

Route::get('/login', function () {
    return view(view: 'auth/login',);
});

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

Route::get('/admin-property', function () {
    return view('admin/product', ['title' => 'Management Property']);
});

Route::get('/admin-user', function () {
    return view('admin/user', ['title' => 'Management User']);
});

Route::get('/admin-review', function () {
    return view('admin/review', ['title' => 'Management Review']);
});

Route::get('/admin-rotator', function () {
    return view('admin/rotator', ['title' => 'Management Rotator']);
});

Route::get('/admin-blog', function () {
    return view('admin/blog', ['title' => 'Management Blog']);
});

