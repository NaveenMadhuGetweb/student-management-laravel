@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Course</h2>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
            ← Back to Courses
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Course Details</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('courses.update',$course->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Department --}}
                <div class="mb-3">
                    <label for="department_id" class="form-label">
                        Department <span class="text-danger">*</span>
                    </label>
                    
                    <select name="department_id" class="form-control">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $course->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
        
                    @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Course Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Course Name <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="name" id="name" value="{{ $course->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter course name">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Course Code --}}
                <div class="mb-3">
                    <label for="code" class="form-label">
                        Course Code <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="code" id="code" value="{{ $course->code }}" class="form-control @error('code') is-invalid @enderror" placeholder="Example: BSC-CS">

                    @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Duration --}}
                <div class="mb-3">
                    <label for="duration" class="form-label">
                        Duration
                    </label>

                    <input type="number" name="duration" id="duration" value="{{ $course->duration }}" class="form-control @error('duration') is-invalid @enderror" placeholder="Example: 3" min="1">

                    @error('duration')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Fees --}}
                <div class="mb-3">
                    <label for="fees" class="form-label">
                        Course Fees
                    </label>

                    <input type="number" name="fees" id="fees" value="{{ $course->fees }}" class="form-control @error('fees') is-invalid @enderror" placeholder="Example: 75000" min="0" step="0.01">

                    @error('fees')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Level --}}
                <div class="mb-3">
                    <label for="level" class="form-label">
                        Course Level
                    </label>

                    <select name="level" id="level" class="form-select @error('level') is-invalid @enderror">
                        <option value="">-- Select Level --</option>               
                        <option value="UG" {{ $course->level  == 'UG' ? 'selected' : '' }}>UG</option>
                        <option value="PG" {{ $course->level == 'PG' ? 'selected' : '' }}>PG</option>
                        <option value="Diploma" {{ $course->level == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="Certificate" {{ $course->level == 'Certificate' ? 'selected' : '' }}>Certificate</option>
                    </select>

                    @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>

                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter course description">{{ $course->description }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label for="status" class="form-label">
                        Status
                    </label>

                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="1" {{ $course->status == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $course->status === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Course</button>

                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection