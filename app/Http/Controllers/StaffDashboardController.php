<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StaffDashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();

        return view('staff.dashboard', compact('totalStudents'));
    }
}
