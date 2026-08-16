<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Department;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::latest()->paginate(10);

        return view('courses.index', compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::get();

        return view('courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required',
            'code' => 'required|unique:courses',
            'fees' => 'required',
            'duration' => 'required',
            'level' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Course::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'code' => $request->code,
            'fees' => $request->fees,
            'duration' => $request->duration,
            'level'=>$request->level,
            'description'=>$request->description,
            'status'=>$request->status
        ]);

        return redirect()->route('courses.index') ->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        	$departments = Department::all();

        	return view('courses.edit', compact('course', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:courses,code,' . $course->id,
            'fees' => 'nullable|numeric|min:0',
            'duration' => 'nullable|integer|min:1',
            'level' => 'nullable|in:UG,PG,Diploma,Certificate',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $course->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'code' => $request->code,
            'fees' => $request->fees,
            'duration' => $request->duration,
            'level' => $request->level,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    
        return redirect()->route('courses.index') ->with('success', 'Student added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Student deleted successfully.'); 
    }
}
