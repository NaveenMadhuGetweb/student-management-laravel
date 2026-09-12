@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Subject Management</h2>

        <a href="{{ route('subjects.create') }}" class="btn btn-primary">
            + Add Subject
        </a>
 
    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Subjects</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Code</th>
                            <th>Subject Name</th>
                            <th>Semester</th>
                            <th>Credits</th>
                            <th>Status</th>
                            <th width="220">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($subjects as $subject)

                            <tr>

                                <td>
                                    {{-- {{ $subjects->firstItem() + $loop->index }} --}}
                                </td>

                                <td>
                                    {{ $subject->course->name }}
                                </td>

                                <td>
                                    {{ $subject->code }}
                                </td>

                                <td>
                                    {{ $subject->name }}
                                </td>

                                <td>
                                    Semester {{ $subject->semester }}
                                </td>

                                <td>
                                    {{ $subject->credits ?? '-' }}
                                </td>

                                <td>

                                    @if($subject->status)

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ route('subjects.show', $subject->id) }}"
                                        class="btn btn-sm btn-info text-white"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('subjects.edit', $subject->id) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('subjects.destroy', $subject->id) }}"
                                        method="POST"
                                        class="d-inline"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this subject?')"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center">
                                    No subjects found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="mt-3">

                {{-- {{ $subjects->links() }} --}}

            </div>

        </div>

    </div>

</div>

@endsection
