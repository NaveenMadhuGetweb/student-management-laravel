
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>Student Details</h3>
    </div>
    <div class="card-body">
        @if($student->photo)
	        <img src="{{ asset('storage/students/'.$student->photo) }}" width="180" class="img-thumbnail">
        @endif
        <p><strong>ID :</strong> {{ $student->id }}</p>
        <p><strong>Name :</strong> {{ $student->name }}</p>
        <p><strong>Email :</strong> {{ $student->email }}</p>
        <p><strong>Department :</strong> {{ $student->department?->department_name }}</p>
        <p><strong>Phone :</strong> {{ $student->phone }}</p>
        <p><strong>Gender :</strong> {{ $student->gender }}</p>
        <p><strong>Date Of Birth :</strong> {{ $student->date_of_birth }}</p>
        <p><strong>Address :</strong> {{ $student->address }}</p>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>
</div>
@endsection

