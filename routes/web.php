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
});

/*Route::get('/register/{id_parent}', function () {
    return view('auth.register');
});*/

//Route::resource('/dashboard', 'App\Http\Controllers\inicio_sesion@index');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\inicio_sesion@index')->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/settings', App\Http\Livewire\Settings::class)->name('settings');
    Route::get('/settings/catalog/personal-values', App\Http\Livewire\PersonalValues::class)->name('personal-values');
    Route::get('/settings/catalog/personal-values/new', App\Http\Livewire\PersonalValues::class)->name('personal-values');
});

