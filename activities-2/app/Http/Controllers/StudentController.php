<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $students = Student::when($search, function($query, $search){
                        return $query->where('name', 'like', "%{$search}%")
                                     ->orWhere('course', 'like', "%{$search}%")
                                     ->orWhere('email', 'like', "%{$search}%");
                    })->latest()->paginate(5);

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'course'=>'required|string|max:255',
            'year_level'=>'required|integer',
            'email'=>'required|email|unique:students,email',
            'address'=>'required|string|max:255',
            'image'=>'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('students', 'public');
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'course'=>'required|string|max:255',
            'year_level'=>'required|integer',
            'email'=>'required|email|unique:students,email,'.$student->id,
            'address'=>'required|string|max:255',
            'image'=>'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            if($student->image) Storage::disk('public')->delete($student->image);
            $data['image'] = $request->file('image')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        if($student->image) Storage::disk('public')->delete($student->image);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}