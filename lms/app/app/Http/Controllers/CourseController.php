<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        Course::create([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'lecturer_id' => $request->lecturer_id,
        ]);

        return redirect('/')->with('success', 'Course Added Successfully');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $students = Student::all();
        $lecturers = Lecturer::all();
        $courses = Course::with('lecturer')->get();

        return view('index', compact('students','lecturers','courses','course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'lecturer_id' => $request->lecturer_id,
        ]);

        return redirect('/')->with('success', 'Course Updated Successfully');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        return redirect('/')->with('success', 'Course Deleted Successfully');
    }
}
