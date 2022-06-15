<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
// use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\TaskAPIController;

class TaskAPIController extends Controller{
    
    protected $taskService;

    public function __construct(TaskService $taskService){
            $this->taskRepository = $taskRepository;
    }

    public function createTask(Request $request) {
        // dd($request);

        Task::create([
            'user_id' => $request->user_id,
            'title' => $request->title, 
            'detail' => $request->details,
            'priority' => $request->priority
        ]);

        return response()->json([
            'message' => 'Task successfully created'
        ]);
    }

    public function getAllTasks(){
        $tasks = $this->taskService->getAllTasks();

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    public function getTaskById($id) {
        $task = $this->taskService->getTaskById($id);

        return response()->json([
            'task' => $task
        ]);
    }

    public function updateTask(Request $request, $id){
        
        $task = Task::find($id);
        
        $task->title = $request->title;
        $task->detail = $request->details;
        $task->priority = $request->priority;

        $task->save();

        return response()->json([
            'message' => 'Task updated succesfully'
        ]);
    }

    public function deleteTask($id){
        $task = Task::find($id);

        $task->delete();

        return response()->json([
            'message' => 'Task deleted succesfully'
        ]);
    }
}
