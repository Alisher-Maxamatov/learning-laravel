<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();

            if ($user->role === 'admin') {
                $tasks = Task::with('user')->paginate(10);
            } else {
                $tasks = Task::where('user_id', $user->id)->paginate(10);
            }

            return response()->json($tasks);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching tasks',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();

            if ($user->role === 'moderator') {
                return response()->json([
                    'message' => 'Moderators cannot create new tasks. Access denied.'
                ], 403);
            }

            $request->validate([
                'task_name' => 'required|string|max:255',
                'task_content' => 'required|string',
                'status' => 'sometimes|in:in_progress,done,cancelled',
            ]);

            $task = Task::create([
                'task_name' => $request->task_name,
                'task_content' => $request->task_content,
                'status' => $request->status ?? 'in_progress',
                'user_id' => $user->role === 'admin' ? ($request->user_id ?? $user->id) : $user->id,
            ]);

            return response()->json([
                'message' => 'Task created successfully',
                'task' => $task->load('user')
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating task',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $user = Auth::user();
            $task = Task::with('user')->find($id);

            if (!$task) {
                return response()->json(['message' => 'Task not found'], 404);
            }

            if ($user->role !== 'admin' && $task->user_id !== $user->id) {
                return response()->json(['message' => 'Access denied'], 403);
            }

            return response()->json($task);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching task',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $task = Task::find($id);

            if (!$task) {
                return response()->json(['message' => 'Task not found'], 404);
            }

            if ($user->role === 'user' && $task->user_id !== $user->id) {
                return response()->json(['message' => 'Access denied'], 403);
            }

            $request->validate([
                'task_name' => 'sometimes|required|string|max:255',
                'task_content' => 'sometimes|required|string',
                'status' => 'sometimes|in:in_progress,done,cancelled',
            ]);

            $task->update($request->only(['task_name', 'task_content', 'status']));

            return response()->json([
                'message' => 'Task updated successfully',
                'task' => $task->load('user')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating task',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();

            if ($user->role === 'moderator') {
                return response()->json([
                    'message' => 'Moderators cannot delete tasks. Access denied.'
                ], 403);
            }

            $task = Task::find($id);

            if (!$task) {
                return response()->json(['message' => 'Task not found'], 404);
            }

            if ($user->role !== 'admin' && $task->user_id !== $user->id) {
                return response()->json(['message' => 'Access denied'], 403);
            }

            $task->delete();

            return response()->json(['message' => 'Task deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting task',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
