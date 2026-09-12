<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\Course;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('course')
            ->latest();
            // ->paginate(10);
        // dd($subjects);
        // $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::where('status', true)
            ->orderBy('name')
            ->get();
        // $courses = Course::all();
        // $departments = Department::get();

        // return view('courses.create', compact('departments'));

        return view('subjects.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'code' => 'required|string|max:255|unique:subjects,code',
            'name' => 'required|string|max:255',
            'semester' => 'required|integer|min:1',
            'credits' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Subject::create([
            'course_id' => $request->course_id,
            'code' => $request->code,
            'name' => $request->name,
            'semester' => $request->semester,
            'credits' => $request->credits,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(subject $subject)
    {

        // $subject->load('course');

        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subject $subject)
    {
       $courses = Course::where('status', true)
            ->orderBy('name')
            ->get();

        return view('subjects.edit', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subject $subject)
    {
      $request->validate([
            'course_id' => 'required|exists:courses,id',
            'code' => 'required|string|max:255|unique:subjects,code,' . $subject->id,
            'name' => 'required|string|max:255',
            'semester' => 'required|integer|min:1',
            'credits' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $subject->update([
            'course_id' => $request->course_id,
            'code' => $request->code,
            'name' => $request->name,
            'semester' => $request->semester,
            'credits' => $request->credits,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subject $subject)
    {
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
}
