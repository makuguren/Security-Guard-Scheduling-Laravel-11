<?php

use App\Http\Controllers\GuardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Guard View
Route::controller(GuardController::class)->group(function () {
    Route::get('/', 'index')->name('guards.index');
    Route::get('guards/create', 'create')->name('guards.create');
    Route::post('guards/create', 'store')->name('guards.store');
    Route::get('guards/{id}/edit', 'edit')->name('guards.edit');
    Route::put('guards/{id}/edit', 'update')->name('guards.update');
    Route::get('guards/{id}/delete', 'destroy')->name('guards.delete');
});
