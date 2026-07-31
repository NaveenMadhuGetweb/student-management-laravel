<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {//dd($request->search);
        $students = Student::all();
        // return view('students.index', compact('students'));
        
        $search = $request->search;

        $students = Student::when($search, function ($query, $search) {
            // return $query->where('name', 'like', "%{$search}%")
            //             ->orWhere('department', 'like', "%{$search}%");
        
            return  $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('department', function ($q) use ($search) {
                      $q->where('department_name', 'like', "%{$search}%");
                  });
        })
        ->paginate(10)
        ->withQueryString();    //For Ex: students?search=Computer&page=2 -> without using this the search filter would be lost when changing pages
        // dd($students); exit;
        return view('students.index', compact('students', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        // return view('students.create');
        return view('students.create', compact('departments'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone'=>'required|digits:10',
            'gender'=>'required',
            'date_of_birth'=>'required|date',
            'address'=>'required'
        ]);

        // Student::create($request->all());
    
        $photoName = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('students', $photoName, 'public');
        }
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'phone' => $request->phone,
            'photo' => $photoName,
            'gender'=>$request->gender,
            'date_of_birth'=>$request->date_of_birth,
            'address'=>$request->address
        ]);

        return redirect()->route('students.index') ->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        	$departments = Department::all();
        //  return view('students.edit', compact('student'));
        	return view('students.edit', compact('student', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {//dd("hi",$request-all() ,$student->photo);
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'department_id' => 'required|exists:departments,id',
                'phone'=>'required|digits:10',
                'gender'=>'required',
                'date_of_birth'=>'required|date',
                'address'=>'required',
                'photo'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            //dd($request ,$student->photo);
            if ($request->hasFile('photo')) {

                // Delete old photo
                if ($student->photo && Storage::disk('public')->exists('students/'.$student->photo) ) {

                    Storage::disk('public')->delete('students/'.$student->photo);
                }

                $photoName = time().'.'.$request->photo->extension();

                $request->photo->storeAs(
                    'students',
                    $photoName,
                    'public'
                );

                // $student->photo = $photoName;
            }elseif(!$request->hasFile('photo') && !$student->photo ){
                 $photoName = null;
            }elseif($student->photo){
                $photoName = $student->photo;
            }

        	// $student->name = $request->name;
        	// $student->email = $request->email;
        	// $student->department = $request->department;
        	// $student->phone = $request->phone;
        	// $student->save();

            $student->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'department_id'=>$request->department_id,
                'photo'=>$photoName,
                'gender'=>$request->gender,
                'date_of_birth'=>$request->date_of_birth,
                'address'=>$request->address,
                'phone'=>$request->phone
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

    public function checkEmail(Request $request)
    {
        $exists = Student::where('email', $request->email)->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }

}
