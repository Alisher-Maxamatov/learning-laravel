<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'admin' || $user->role === 'moderator'){
            $tasks = Task::paginate(2);
        } else {
            $tasks = $user->tasks()->paginate(2);
        }
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        if (auth()->user()->role === 'moderator') {
            return back()->with('error', " Sizda vazifa yaratishga ruxsat yo'q");
        }
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        if (auth()->user()->role === 'moderator') {
            return back()->with('error', 'Sizda vazifa yaratishga ruxsat yo‘q');
        }
        $request->validate([
            'task_name' => 'required|max:255',
            'task_content' => 'required|string',
        ]);
        auth()->user()->tasks()->create([
            'task_name' => $request->task_name,
            'task_content' => $request->task_content,
            'status' => 'in_progress',
        ]);
        return redirect()->route('tasks.index')->with('success',"Vazifa yaratildi");
    }
    public function show(string $id)
    {

    }
    public function edit(Task $task)
    {
        $user = auth()->user();
        if ($user->role() === 'user' && $task->user_id !== $user->id){
            abort(403,"Siz boshqa user vazifalarini o'zgartira olmaysiz");
        }
        return view('tasks.edit',compact($task));
    }
    public function update(Request $request, Task $task)
    {
        $user = auth()->user();
        if ($user->role() === 'user' && $task->user_id !== $user->id){
            abort(403,"Siz boshqa user vazifalarini o'zgartira olmaysiz");
        }
        return redirect()->back()->with('seccess',"Vazifa yangilandi");
    }
    public function destroy(Task $task)
    {
        $user = auth()->user();
        if ($user->role() === 'moderator') {
            return back()->with('error',"Sizda vazifalarni o'chirishga ruxsat yo'q" );
        }
        if ($user->role() === 'user' && $task->user_id !== $user->id) {
            abort(403, "Siz boshqalarni vazifasini o'chira olmaysiz");
        }
        $task->delete();
        return redirect()->back()->with('success',"Vazifa o'chirildi");
    }
}
