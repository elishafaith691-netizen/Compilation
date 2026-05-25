<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Show the form
    public function create()
    {
        return view('form.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'full_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'course' => 'required',
            'level' => 'required',
        ]);

        // Optional: store in database here

        return redirect('/course-registration')
               ->with('success', 'Course registration successful!');
    }
}
