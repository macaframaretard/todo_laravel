<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
Route::post('/task', [TaskController::class, 'store'])->name('task');
Route::delete('/task/{id}', [TaskController::class, 'delete'])->name('task_delete');

Route::get('/', [HomeController::class, 'main'])->name('main');
