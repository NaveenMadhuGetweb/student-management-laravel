<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'department' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
         return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'department'=>'required'
                // 'phone'=>'required'
            ]);

            $student->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'department'=>$request->department
                // 'phone'=>$request->phone

            ]);

            return redirect()
                    ->route('students.index')
                    ->with('success','Student Updated Successfully');            
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
    $student->delete();

    return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
