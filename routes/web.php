<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\RelationshipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('relationships', RelationshipController::class)->except('show');

Route::resource('families', FamilyController::class);

