<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();

        return view('task.index', compact('tasks'));
    }


    public function create()
    {
        $task = new Task();

        return view('task.create', compact('task'));
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        $task = new Task();
        $task->fill($data);
        $task->user()->associate($user);
        $task->save();

        flash(__('flash.task_create'))->success();

        return redirect()
            ->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->fill($data);
        $task->save();

        flash(__('flash.task_update'))->success();

        return redirect()
            ->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        if ($task) {
            $task->delete();
        }

        flash(__('flash.task_delete'))->success();

        return redirect()
            ->route('tasks.index');
    }
}
