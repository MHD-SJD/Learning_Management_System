<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function store(Request $request)
    {
        Lecturer::create([
            'name' => $request->name,
            'email' => $request->email,
            'specialization' => $request->specialization,
        ]);

        return redirect('/')->with('success', 'Lecturer Added Successfully');
    }

    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $students = Student::all();
        $lecturers = Lecturer::all();
        $courses = Course::with('lecturer')->get();

        return view('index', compact('students','lecturers','courses','lecturer'));
    }

    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $lecturer->update([
            'name' => $request->name,
            'email' => $request->email,
            'specialization' => $request->specialization,
        ]);

        return redirect('/')->with('success', 'Lecturer Updated Successfully');
    }

    public function destroy($id)
    {
        Lecturer::findOrFail($id)->delete();

        return redirect('/')->with('success', 'Lecturer Deleted Successfully');
    }
}
