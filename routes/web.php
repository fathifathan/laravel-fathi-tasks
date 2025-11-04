<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/dbfacade', [MahasiswaController::class, 'index']);
Route::get('/insert-sql', [MahasiswaController::class, 'insertSql']);
Route::get('/insert-binding', [MahasiswaController::class, 'insertBinding']);
Route::get('/update', [MahasiswaController::class, 'update']);
Route::get('/delete', [MahasiswaController::class, 'delete']);
Route::get('/select', [MahasiswaController::class, 'select']);
Route::get('/select-view', [MahasiswaController::class, 'selectView']);
Route::get('/select-where', [MahasiswaController::class, 'selectWhere']);
Route::get('/statement', [MahasiswaController::class, 'statement']);

//  MINI STUDY CASE
Route::get('/student', [MahasiswaController::class, 'indexQB']);
Route::get('/student/{nim}', [MahasiswaController::class, 'showQB']);


// Default
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/program', function () {
    return view('program');
});

Route::get('/team', function () {
    return view('team'); 
});

Route::get('/contact', function () {
    return view('contact');
});

// route mahasiswa dengan data array
Route::get('/mahasiswa', function () {
    $data = [
        'mahasiswa' => ['Risa Lestari','Rudi Hermawan','Bambang Kusumo','Lisa Permata']
    ];
    return view('universitas.mahasiswa', $data);
});

// route parameter
Route::get('/program/{id}', function ($id) {
    return view('program-detail', ['id' => $id]);
});

// route grup
Route::prefix('/info')->group(function(){

    Route::get('/about', function () {
        return view('info.about');
    });

    Route::get('/team', function () {
        return view('info.team');
    });

});

// route fallback
Route::fallback(function(){
    return view('errors.404');
});

// route redirect
Route::redirect('/home', '/');
