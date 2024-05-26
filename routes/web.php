<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewtaskController;
Route::controller(NewtaskController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('/add/new/task', 'store');
    Route::get('edit/task/{id}', 'edit');
    Route::post('update/task', 'update');
    Route::get('delete/task/{id}', 'destroy');
    Route::get('status/update/{id}', 'statusupdate');
});

