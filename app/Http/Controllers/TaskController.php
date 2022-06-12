<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    //

    public function index() {

        $tasks = Task::all();
        // dd($tasks);

        return view('index', ['tasks' => $tasks]);

    }

    public function addTask() {
        
        $users = User::all();

        return view('add-task', compact('users'));
    }

    public function editTask($id) {
        
        $task = Task::find($id);


        return view('edit-task', compact('task', 'id'));
    }

    public function createTask(Request $request) {
        // dd($request);

        Task::create([
            'user_id' => $request->user_id,
            'title' => $request->title, 
            'detail' => $request->details,
            'priority' => $request->priority
        ]);

        return redirect(route('home'));
    }


    public function updateTask(Request $request, $id){
        
        $task = Task::find($id);
        
        $task->title = $request->title;
        $task->detail = $request->details;
        $task->priority = $request->priority;

        $task->save();

        return redirect('/');
    }

    public function deleteTask($id){
        $task = Task::find($id);

        $task->delete();

        return redirect('/');

    }
}
