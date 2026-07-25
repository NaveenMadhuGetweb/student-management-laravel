
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>Student Details</h3>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $student->id }}</p>
        <p><strong>Name :</strong> {{ $student->name }}</p>
        <p><strong>Email :</strong> {{ $student->email }}</p>
        <p><strong>Department :</strong> {{ $student->department }}</p>
        {{-- <p><strong>Phone :</strong> {{ $student->phone }}</p> --}}
        <a href="{{ route('students.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>
</div>
@endsection

