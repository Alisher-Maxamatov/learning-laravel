@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Yangi vazifa qo'shish</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Vazifa nomi</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Vazifa tavsifi</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Saqlash</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection
