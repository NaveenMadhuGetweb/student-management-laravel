@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <p class="fw-bold"> Total Students : {{ $courses->total() }} </p>
    
@if(auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
    <a href="{{ route('courses.create') }}" class="btn btn-info">Add Course</a>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Code</th>
            <th>Duration</th>
            <th>Fees</th>
            <th>Level</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->department?->department_name }}</td> <!-- ? This prevents errors if department_id is NULL. -->
            <td>{{ $course->name }}</td>
            <td>{{ $course->code }}</td>
            <td>{{ $course->duration }}</td>
            <td>{{ $course->fees }}</td>
            <td>{{ $course->level }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->status }}</td>
            <td>
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">
                    View
                </a>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                @if(auth()->user()->role == 'admin')
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')                
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
                        Delete
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="text-center text-danger"> No courses found.</td>
        </tr>
        @endforelse

    </tbody>
</table>
	<div class="mt-3">
	    {{ $courses->links() }}
	</div>
    
@endsection
