<?php

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
    return view('site.home');
})->name('site.home');

Route::get('/login-site', function () {
    return view('site.login-site');
})->name('site.login-site');

Route::get('/sobre', function () {
    return view('site.sobre');
})->name('site.sobre');

Route::get('/cadastro', function () {
    return view('site.cadastro');
})->name('site.cadastro');