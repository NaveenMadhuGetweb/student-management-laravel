<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->paginate(10);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $departments = Department::all();
        return view('departments.create');
        // return view('students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'department_name' => 'required|unique:departments'
        ]);
        Department::create($request->all());

        return redirect()->route('departments.index')->with('success','Department Added Successfully');
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
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
         $request->validate([
            'department_name' =>
            'required|unique:departments,department_name,'.$department->id
        ]);

        // $department->update($request->all());
        $department->update([
            'department_name' => $request->department_name,
        ]);

        return redirect()->route('departments.index')->with('success','Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
    
        return redirect()->route('departments.index')->with('success','Department Deleted Successfully');
    }
}
