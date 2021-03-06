<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;

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

Route::get('/', [TodolistController::class, 'showAllData']);

Route::get('delete/{id}', [TodolistController::class, 'delete']);

Route::get('create', [TodolistController::class, 'createView']);

Route::get('createTodo', [TodolistController::class, 'createTodo']);

Route::get('edit/{id}', [TodolistController::class, 'editView']);

Route::get('updateTodo/{id}', [TodolistController::class, 'updateTodo']);
