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

    {{-- <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
    </div> --}}
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
