<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskService {
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks() {
        return $this->taskRepository->getAllTasks();
    }

    public function getTaskById($taskId) {
        $task = $this->taskRepository->getTaskById($taskId);

        return $task;
    }
     
    public function createTask(Request $request) {
        $taskData = [
            'user_id' => $request->user_id,
            'title' => $request->title, 
            'detail' => $request->details,
            'priority' => $request->priority
        ];
        return $this->taskRepository->createTask($taskData);
    }

    public function deleteTask(Request $request, $taskId){
        $taskData = [
            'title' => $request->title, 
            'detail' => $request->details,
            'priority' => $request->priority
        ];

        return $this->taskRepository->updateTask($taskData);
    }

    
}