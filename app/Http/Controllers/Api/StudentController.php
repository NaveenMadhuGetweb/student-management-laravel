<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Student::with('department')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:students',
                'phone'=>'required',
                'department_id'=>'required',
                'gender'=>'required',
                'date_of_birth'=>'required|date',
                'address'=>'required'
            ]);

            $student = Student::create($validated);

            return response()->json([
                'message'=>'Student Created Successfully',
                'student'=>$student
            ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('department')->findOrFail($id);

        return response()->json($student);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $student = Student::findOrFail($id);
            
            $validated = $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:students,email,'.$student->id,
                'phone'=>'required',
                'department_id'=>'required',
                'gender'=>'required',
                'date_of_birth'=>'required|date',
                'address'=>'required'
            ]);

            $student->update($validated);

            return response()->json([
                'message'=>'Student Updated Successfully',
                'student'=>$student
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'message'=>'Student Deleted Successfully'
        ]);

    }
}
