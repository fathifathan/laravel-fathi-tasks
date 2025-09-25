<?php

use Illuminate\Support\Facades\Route;

// Default
Route::get('/', function () {
    return "<h1>welcome to home page</h1>";
});

Route::get('/about', function () {
    return "about us";
});

Route::get('/program', function () {
    return "this is program";
});

Route::get('/team', function () {
    return "this is our team"; 
});

Route::get('/contact', function () {
    return "this is my contact";
});

// route parameter
Route::get('program/{id}', function ($id) {
    return "ini program ke : {$id}";
});

// route grup
Route::prefix('/info')->group(function(){

    Route::get('/about', function () {
    echo "<h1>info-about</h1>";
    });

    Route::get('/team', function () {
    echo "<h1>info-team</h1>";
    });

});

// route fallback
Route::fallback(function(){
    return "maaf, halaman yang anda cari tidak ditemukan    ";
});


// route redirect
Route::redirect('/home', '/');