@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

<form action="{{ route('students.update',$student->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}">
    </div>

    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" value="{{ $student->department }}">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
    </div>
    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control">
                <option value="">Select Gender</option> 
                <option value="Male" {{ old('gender',$student->gender)=='Male' ? 'selected' : '' }}>Male</option>
                <option value="Female"{{ old('gender',$student->gender)=='Female' ? 'selected' : '' }} >Female</option>
                <option value="Other">Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth',$student->date_of_birth) }}">
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" rows="4" class="form-control">{{ old('address',$student->address) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Current Photo</label>
        @if($student->photo)
            <img src="{{ asset('storage/students/'.$student->photo) }}" width="60" height="60" class="rounded">
        @else
            No Photo
        @endif
    </div>
    <div class="mb-3">
        <label>Change Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>


    <button class="btn btn-primary">
        Update Student
    </button>

</form>

@endsection
