<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/delete/{id}', [CategoryController ::class, 'deleteCategory']);
Route::get('/category/get/{id}', [CategoryController ::class, 'getCategory'])->name('categories.category');
Route::get('/category/parent/{id}', [CategoryController ::class, 'parentCategory'])->name('categories.index');
Route::get('/category/get/{id}/updateOrCreate', [CategoryController ::class, 'updateOrCreateCategory'])->name('categories.index');
