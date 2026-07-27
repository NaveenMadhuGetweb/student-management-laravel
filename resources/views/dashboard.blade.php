<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

@section('content')
<div class="container">
    <div class="row mt-5">
        
        <div class="col-md-4 mb-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none">
                <div class="card shadow text-bg-primary">
                    <div class="card-body text-center">                        
                        <h5><i class="bi bi-people-fill"></i> Total Students</h5>
                        <h2>{{ $totalStudents }}</h2>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('departments.index') }}" class="text-decoration-none">
                <div class="card shadow text-bg-primary">
                    <div class="card-body text-center">
                        <h5><i class="bi bi-building"></i> Departments</h5>
                        <h2>{{ $totalDepartments }}</h2>
                    </div>
                </div>
            </a>    
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow text-bg-primary">
                <div class="card-body text-center">                        
                    <h5><i class="bi bi-person-plus-fill"></i> New This Month</h5>
                    <h2>{{ $newStudents }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow text-bg-primary">
                <div class="card-body text-center">                        
                    <h5><i class="bi bi-gender-male"></i> Male Students</h5>
                    <h2>{{ $maleStudents }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow text-bg-primary">
                <div class="card-body text-center">                        
                    <h5><i class="bi bi-gender-female"></i> Female Students</h5>
                    <h2>{{ $femaleStudents }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
</x-app-layout>
