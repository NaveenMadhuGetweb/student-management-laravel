@extends('layouts.app')

@section('content')

<h2>Edit Department</h2>

<a href="{{ route('departments.index') }}" class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('departments.update', $department->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Department Name</label>
        <input type="text" name="department_name" class="form-control" value="{{ old('department_name', $department->department_name) }}" required>

        @error('department_name')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Update Department
    </button>

</form>

@endsection