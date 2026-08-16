
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>courses Details</h3>
    </div>
    <div class="card-body">
        <p><strong>ID :</strong> {{ $course->id }}</p>
        <p><strong>Name :</strong> {{ $course->name }}</p>
        <p><strong>Code :</strong> {{ $course->code }}</p>
        <p><strong>Department :</strong> {{ $course->department?->department_name }}</p>
        <p><strong>Duration :</strong> {{ $course->duration }}</p>
        <p><strong>Fees :</strong> {{ $course->fees }}</p>
        <p><strong>Level :</strong> {{ $course->level }}</p>
        <p><strong>Description :</strong> {{ $course->description }}</p>
        <p><strong>Stauts :</strong> {{ $course->status }}</p>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>
</div>
@endsection

