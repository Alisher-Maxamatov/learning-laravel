@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}!</h1>
    <p>Go to <a href="{{ route('tasks.index') }}">your tasks</a></p>
@endsection
