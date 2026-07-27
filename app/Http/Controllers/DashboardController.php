<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use Carbon\Carbon;

class DashboardController extends Controller
{
        public function index()
    {
        $totalStudents = Student::count();
        $totalDepartments = Department::count();
        $newStudents = Student::whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $maleStudents = Student::where('gender', 'Male')->count();
        $femaleStudents = Student::where('gender', 'Female')->count();
        return view('dashboard', compact(
            'totalStudents',
            'totalDepartments',
            'newStudents',
            'maleStudents',
            'femaleStudents'
        ));
    }
}
