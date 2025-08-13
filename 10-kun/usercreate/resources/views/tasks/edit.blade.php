@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Vazifani tahrirlash</h2>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Vazifa nomi</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Tavsif</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Holat</label>
                <select class="form-select" id="status" name="status">
                    <option value="in_process" @selected($task->status === 'in_process')>Jarayonda</option>
                    <option value="done" @selected($task->status === 'done')>Bajarilgan</option>
                    <option value="cancelled" @selected($task->status === 'cancelled')>Bekor qilingan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Saqlash</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection
