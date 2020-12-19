<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $tasks = Task::all();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::post('/tasks', function (Request $request) {
    $task = new Task;

    $task->name = $request->input('name');
    $task->state = true;

    $task->save();
    return redirect('/tasks');
});

Route::delete('/tasks/{id}', function ($id) {
    Task::destroy($id);
    return redirect('/tasks');
});

Route::put('tasks', function (Request $request) {

});
