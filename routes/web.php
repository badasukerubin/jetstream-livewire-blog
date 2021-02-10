<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/details/{id}', function () {
    return view('details');
})->name('blog.details');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/blog/create', function () {
        return view('blog.create');
    })->name('dashboard.blog.create');

    Route::get('/blog/read', function () {
        return view('blog.read');
    })->name('dashboard.blog.read');
});
