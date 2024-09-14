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
    return view('about', ['title' => 'About', 'header' => 'About', 'breadcrumbs' => 'About']);
});

Route::get('/services', function () {
    return view('services', ['title' => 'Services', 'header' => 'Services', 'breadcrumbs' => 'Services']);
});

Route::get('/projects', function () {
    return view('projects', ['title' => 'Projects', 'header' => 'Projects', 'breadcrumbs' => 'Projects']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'header' => 'Blog', 'breadcrumbs' => 'Blog']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'header' => 'Contact', 'breadcrumbs' => 'Contact']);
});

// Route::get('/Dropdown', function () {
//     return view('index');
// });