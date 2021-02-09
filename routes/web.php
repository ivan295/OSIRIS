<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//***************************************************************************************
//*								USUARIOS												*
//***************************************************************************************
// Route::get('User/index' , [App\Http\Controllers\UserController::class, 'index']);
// Route::post('User/create' , [App\Http\Controllers\UserController::class, 'store']);
// Route::post('User/{id}/edit',[App\Http\Controllers\UserController::class, 'edit']);
// Route::put('User/{id}',[App\Http\Controllers\UserController::class, 'update']);
// Route::delete('User/{id}/delete',[App\Http\Controllers\UserController::class, 'destroy']);

Route::resource('User',UserController::class);
//***************************************************************************************
//*								 CATEGORIAS												*
//***************************************************************************************
Route::get('Categories/index' , [App\Http\Controllers\CategoriesController::class, 'index']);
Route::post('Categories/create', [App\Http\Controllers\CategoriesController::class, 'store']);

// Route::get('Categories/create', ['as' => 'Categories.create', 'uses'=>'CategoriesController@store']);

Route::get('/tabla', [App\Http\Controllers\TablaController::class, 'index']);

// Route::get('datatable/users',[App\Http\Controllers\DatatableController::class, 'user'])->name('datatable.users');

