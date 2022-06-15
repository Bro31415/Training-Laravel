<?php

namespace App\Repositories;
use App\Models\Task;

class TaskRepository{
    protected $task;

    public function __construct(Task $task){
        $this->task = $task;
    }

    public function getAllTasks(){
        $data = $this->task::all();
            
        return $data;
    }

    public function getTaskById($taskId) {
        $data = $this->task->find($taskId);

        return $data;
    }

    public function createTask($taskData) {
        return $this->task->create($taskData);
    }

    public function updateTask($taskData, $taskId){
        $task = $this->task->find($taskId);

        return $task->update($taskData);
    }
}