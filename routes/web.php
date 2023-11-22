<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CategoryController::class, 'index'])->name('category.index');
Route::get('create', [CategoryController::class, 'create'])->name('category.create');
Route::get('show', [CategoryController::class, 'show'])->name('category.show');
Route::get('edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('store', [CategoryController::class, 'store'])->name('category.store');
Route::post('update', [CategoryController::class, 'update'])->name('category.update');
Route::post('delete', [CategoryController::class, 'delete'])->name('category.delete');
