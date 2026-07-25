@extends('layouts.app')

@section('content')

<a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Back</a>

<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div> 
    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control">
                <option value="">Select Gender</option> 
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control">
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Student Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>


    <button type="submit" class="btn btn-primary">Save Student</button>
</form>

@endsection
