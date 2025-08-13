@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Vazifalar ro'yxati</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">+ Yangi vazifa</a>

        @if($tasks->isEmpty())
            <div class="alert alert-info">Hozircha hech qanday vazifa mavjud emas.</div>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nomi</th>
                    <th>Holati</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ishonchingiz komilmi?')">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
