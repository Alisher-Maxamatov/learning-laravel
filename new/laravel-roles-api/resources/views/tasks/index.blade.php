@extends('layouts.app')

@section('content')
   <h1>Vazifalar ro‘yxati</h1>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="color: red">{{ session('error') }}</div>
    @endif
    <a href="{{route('tasks.create')}}" Yangi vazifa> </a>
    <table border="1" cellpadding="5">
        <tr>
            <id>ID</id>
            <th>Nomi</th>
            <th>Tavsifi</th>
            <th>Status</th>
            <th>Ammallar</th>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task_name}}</td>
                <td>{{$task->task_content}}</td>
                <td>{{$task->status}}</td>
                <td>
                    <a href="{{route('tasks.edit', $task)}}"Tahrirlash></a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit">O‘chirish</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
