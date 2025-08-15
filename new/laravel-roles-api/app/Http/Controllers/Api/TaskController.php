<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'user'){
            $tasks = Task::where('user_id', $user->id)->paginate(3);
        } else {
            $tasks = Task::paginate(3);
        }
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role === 'moderator'){
            return response()->json(['message', 'Moderator yangi vazifa yarata olmaydi'], 403);
        }
        $validated = $request->validate([
            'task_name' => 'required|string|min:3|max:255',
            'task_content' => 'required|string',
        ]);
        $task = Task::create([
            'user_id' => $user->id,
            'task_name' => $validated['task_name'],
            'task_content' => $validated['task_content'],
            'status' => 'in_progress',
        ]);
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $user = auth()->user();
        if ($user->role() === 'user' &&  $task->user_id !== $user->id) {
            return response()->json(["message', 'Bu vazifani ko'rishga ruxsat yo'q"]);
            }
        if ($user->role() === 'admin' || $user->role() === 'moderator'){
            return response()->json([
                'data' => $task
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $user = auth()->user();
        if ($user->role() === 'user' &&  $task->user_id !== $user->id){
            return response()->json(['message',"Bu vazifani o'zgartirishga ruxsat yo'q"], 203);
        };
        $validated = $request->validate([
            'task_name' => 'sometimes|string|max:255',
            'task_content' => 'sometimes|string',
            'status' => 'sometimes|in:in_progress,completed'
        ]);
        $task->update($validated);
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $user = auth()->user();
        if ($user->role() === 'moderator') {
            return response()->json(["message', 'Bu vazifani o'chirishga ruxsat yo'q"]);
        }
    }
}
