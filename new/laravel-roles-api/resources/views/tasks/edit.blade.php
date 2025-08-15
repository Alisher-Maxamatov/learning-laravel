@extends('content')

@section()
    <h1>Vazifani tahrirlash</h1>

    <form action="{{route('tasks.edit', $task)}}" method="POST">
        @csrf
        @method('PUT')
        <label>Vazifa nomi:</label>
        <input type="text" name="task_name" value="{{$task->task_name}}"><br>

        <label>Vazifa tavsifi:</label>
        <textarea name="task_content">{{ $task->task_content }}</textarea><br>

        <label>Status:</label>
        <select name="status">
            <option value="in_progress" @selected($task->status == 'in_progress')>In Progress</option>
            <option value="completed" @selected($task->status == 'completed')>Completed</option>
        </select><br>
        <button type="submit">Yangilash</button>
    </form>

@endsection
