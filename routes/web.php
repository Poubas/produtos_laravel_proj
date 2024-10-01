<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('todo'); })->name('todo.index')->middleware('auth');

Route::post('/add', [TodoController::class, 'add'])->name('todo.add')->middleware('auth');

Route::get('/list', [TodoController::class, 'list'])->name('todo.list')->middleware('auth');

Route::get('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');

Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit')->middleware('auth');

Route::post('/update/{id}', [TodoController::class, 'update'])->name('todo.update');

Route::get('/form-login', function () { return view('login'); })->name('login');

Route::post('/login', [TodoController::class, 'login']);

Route::get('/logout', [TodoController::class, 'logout'])->name('todo.logout');