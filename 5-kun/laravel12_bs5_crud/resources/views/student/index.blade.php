@extends('layouts.app')

@section('content')

<div  class="container mt-4">
    <h2 class="mb-4 text-white">Student list</h2>
    <a href="{{route('student.create')}}" class="btn btn-outline-info mb-3">Add Student</a>
    @session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert" >
        <strong>Success!</strong> {{$value}}
        <button type="close" class="btn-close" data-bs-dismiss="alert" aria-label></button>
    </div>
    @endsession
    <div>
    <table class="table table-bordered table-dark table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
@forelse($students as $student)
        <tbody>

        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>
                <a href="" class="btn btn-outline-warning">View</a>
                <a href="" class="btn btn-outline-info">Edit</a>
                <a href="" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No student found!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
 </div>
@endsection
