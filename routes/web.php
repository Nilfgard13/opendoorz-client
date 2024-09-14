<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/Dropdown', function () {
//     return view('index');
// });