@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Subject</h2>
        <a
            href="{{ route('subjects.index') }}" class="btn btn-secondary">
            ← Back to Subjects
        </a>
    </div>


    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Subject Details</h5>
        </div>


        <div class="card-body">

            <form
                action="{{ route('subjects.store') }}"
                method="POST"
            >

                @csrf


                {{-- Course --}}
                <div class="mb-3">

                    <label for="course_id" class="form-label">
                        Course <span class="text-danger">*</span>
                    </label>

                    <select
                        name="course_id"
                        id="course_id"
                        class="form-select @error('course_id') is-invalid @enderror"
                    >

                        <option value="">
                            -- Select Course --
                        </option>

                        @foreach($courses as $course)

                            <option
                                value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}
                            >
                                {{ $course->name }} ({{ $course->code }})
                            </option>

                        @endforeach

                    </select>

                    @error('course_id')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Subject Code --}}
                <div class="mb-3">

                    <label for="code" class="form-label">
                        Subject Code <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="code"
                        id="code"
                        value="{{ old('code') }}"
                        class="form-control @error('code') is-invalid @enderror"
                        placeholder="Example: CS101"
                    >

                    @error('code')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Subject Name --}}
                <div class="mb-3">

                    <label for="name" class="form-label">
                        Subject Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Example: Programming in C"
                    >

                    @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Semester --}}
                <div class="mb-3">

                    <label for="semester" class="form-label">
                        Semester <span class="text-danger">*</span>
                    </label>

                    <select
                        name="semester"
                        id="semester"
                        class="form-select @error('semester') is-invalid @enderror"
                    >

                        <option value="">
                            -- Select Semester --
                        </option>

                        @for($i = 1; $i <= 8; $i++)

                            <option
                                value="{{ $i }}"
                                {{ old('semester') == $i ? 'selected' : '' }}
                            >
                                Semester {{ $i }}
                            </option>

                        @endfor

                    </select>

                    @error('semester')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Credits --}}
                <div class="mb-3">

                    <label for="credits" class="form-label">
                        Credits
                    </label>

                    <input
                        type="number"
                        name="credits"
                        id="credits"
                        value="{{ old('credits') }}"
                        class="form-control @error('credits') is-invalid @enderror"
                        placeholder="Example: 4"
                        min="1"
                    >

                    @error('credits')

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

                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter subject description"
                    >{{ old('description') }}</textarea>

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

                    <select
                        name="status"
                        id="status"
                        class="form-select @error('status') is-invalid @enderror"
                    >

                        <option
                            value="1"
                            {{ old('status', '1') == '1' ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            {{ old('status') === '0' ? 'selected' : '' }}
                        >
                            Inactive
                        </option>

                    </select>

                    @error('status')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Buttons --}}
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Save Subject
                    </button>

                    <a
                        href="{{ route('subjects.index') }}"
                        class="btn btn-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
