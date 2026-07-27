@extends('layouts.app')

@section('content')

<h2>Add Department</h2>

<a href="{{ route('departments.index') }}" class="btn btn-secondary mb-3">
    Back
</a>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Department Name</label>
        <input type="text" name="department_name" class="form-control" required>
    </div>

    <button class="btn btn-primary">
        Save Department
    </button>

</form>

@endsection
