@extends('layouts.app')

@section('content')
<h1>Yangi vazifa yaratish</h1>
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <label>Vazifa nomi:</label>
        <input type="text" name="task_name"><br>

        <label>Vazifa tavsifi:</label>
        <textarea name="task_content"></textarea><br>
        <button type="submit">Saqlash</button>
    </form>
@endsection
