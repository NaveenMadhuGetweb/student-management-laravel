@extends('layouts.app')

@section('content')

<h2>Departments</h2>

<a href="{{ route('departments.create') }}" class="btn btn-success mb-3">
Add Department
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
        <tr>
            <td>{{ $department->id }}</td>
            <td>{{ $department->department_name }}</td>
            <td>
                <a href="{{ route('departments.edit',$department->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <form action="{{ route('departments.destroy',$department->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
