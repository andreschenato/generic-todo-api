<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where("user_id", auth()->user()->id)->get();
        return new TaskCollection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        return new TaskResource(Task::create($request->all()));
    }

    public function show(Task $task)
    {
        if (auth()->user()->id == $task->user_id) {
            return new TaskResource($task);
        }
        else {
            return response()->json([
                'message' => 'You are not the owner of this task',
            ], 403);
        }
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        if(auth()->user()->id == $task->user_id) {
            $task->update($request->all());
        }
        else {
            return response()->json([
                'message' => 'You are not the owner of this task',
            ], 403);
        }
    }

    public function destroy(Task $task)
    {
        if (auth()->user()->id == $task->user_id) {
            $task->delete();
            return response(status: 204);
        }
        else {
            return response()->json([
                'message' => 'You are not the owner of this task',
            ], 403);
        }
    }
}
