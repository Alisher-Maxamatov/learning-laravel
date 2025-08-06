<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function index()
{
$tasks = auth()->user()->role === 'admin'
? Task::paginate(10)
: Task::where('user_id', auth()->id())->paginate(10);

return view('tasks.index', compact('tasks'));
}

public function create()
{
return view('tasks.create');
}

public function store(Request $request)
{
$request->validate([
'task_name' => 'required|string|max:255',
'content' => 'required|string',
]);

Task::create([
'user_id' => auth()->id(),
'task_name' => $request->task_name,
'content' => $request->task_content,
'status' => 'in_progress',
]);

return redirect()->route('tasks.index')->with('success', 'Task created!');
}

public function edit(Task $task)
{
$this->authorizeTask($task);
return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
$this->authorizeTask($task);

$request->validate([
'task_name' => 'required|string|max:255',
'content' => 'required|string',
'status' => 'required|in:in_progress,done,cancelled',
]);

$task->update($request->all());

return redirect()->route('tasks.index')->with('success', 'Task updated!');
}

public function destroy(Task $task)
{
$this->authorizeTask($task);
$task->delete();
return redirect()->route('tasks.index')->with('success', 'Task deleted!');
}

private function authorizeTask(Task $task)
{
$user = auth()->user();

if ($user->role === 'admin') return true;

if ($user->role === 'moderator') {
abort(403, 'Moderator can only update tasks.');
}

if ($task->user_id !== $user->id) {
abort(403, 'You can only manage your own tasks.');
}
}
}
