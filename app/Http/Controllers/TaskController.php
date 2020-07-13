<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use App\Task;

class TaskController extends Controller
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

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
        $this->service->create($data, $user);


        flash(__('flash.task_create'))->success();

        return redirect()->route('tasks.index');
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
        $this->service->update($data, $task);

        flash(__('flash.task_update'))->success();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $this->service->delete($task);

        flash(__('flash.task_delete'))->success();

        return redirect()->route('tasks.index');
    }
}
