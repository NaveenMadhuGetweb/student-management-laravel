
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>Subject Details</h3>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $subject->id }}</p>
        <p><strong>Course ID :</strong> {{ $subject->course_id }}</p>
        <p><strong>Course Name :</strong> {{ $subject->course->name }}</p>
        <p><strong>Subject Name :</strong> {{ $subject->name }}</p>
        <p><strong>Semester :</strong> {{ $subject->semester }}</p>
        <p><strong>Code :</strong> {{ $subject->code }}</p>
        <p><strong>Credits :</strong> {{ $subject->credits }}</p>
        <p><strong>Description :</strong> {{ $subject->description }}</p>
        {{-- <p><strong>Department :</strong> {{ $course->department?->department_name }}</p> --}}
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>
</div>
@endsection
