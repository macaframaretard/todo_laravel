<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {

        $tasks = Task::all();


        return view('dashboard', [
            'tasks' => $tasks,
        ]);

    }

    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255'
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect('dashboard');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('dashboard');
    }

}
