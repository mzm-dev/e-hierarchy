<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\RelationshipController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('relationships', RelationshipController::class)->except('show')->middleware('auth');

    Route::resource('families', FamilyController::class);
});
