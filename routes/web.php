<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', );
});

Route::get( '/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/services', function () {
    return view('services', ['title' => 'Services']);
});

Route::get('/projects', function () {
    return view('projects', ['title' => 'Projects']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});

// Route::get('/Dropdown', function () {
//     return view('index');
// });

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
