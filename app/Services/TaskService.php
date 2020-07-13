<?php

namespace App\Services;

use App\Task;
use App\User;

class TaskService
{
    public function create(array $data, User $user)
    {
        $task = new Task();
        $task->fill($data);
        $task->user()->associate($user);
        $task->save();
    }
    public function update(array $data, Task $task)
    {
        $task->fill($data);
        $task->save();
    }
    public function delete(Task $task)
    {
        if ($task) {
            $task->delete();
        }
    }
}
