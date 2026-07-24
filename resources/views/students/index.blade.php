@extends('layouts.app')

@section('content')

<a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add Student</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row mb-3">
    <div class="col-md-6">
        <form action="{{ route('students.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Name or Department" value="{{ $search }}">
                <button class="btn btn-primary">
                    Search
                </button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    Reset
                </a>
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->department }}</td>
            <td>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')                
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-danger">
                No students found.
            </td>
        </tr>
        @endforelse

    </tbody>
</table>

@endsection
