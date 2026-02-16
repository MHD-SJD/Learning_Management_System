<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Course;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $lecturers = Lecturer::all();
        $courses = Course::with('lecturer')->get();

        return view('index', compact('students','lecturers','courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'batch' => 'required'
        ]);

        Student::create($request->all());

        return redirect('/')->with('success', 'Student Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $students = Student::all();
        $lecturers = Lecturer::all();
        $courses = Course::with('lecturer')->get();

        return view('index', compact('student','students','lecturers','courses'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required',
            'batch' => 'required'
        ]);

        $student->update($request->all());

        return redirect('/')->with('success', 'Student Updated Successfully');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect('/')->with('success', 'Student Deleted Successfully');
    }
}
