@extends('layouts.app')

@section('content')

<a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Back</a>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save Student</button>
</form>

@endsection
