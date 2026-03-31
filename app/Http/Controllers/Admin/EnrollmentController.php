<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $data = [
            // Wo students jinki profile hai magar enrollment nahi
            'unenrolled_students' => User::role('Student')
                ->whereHas('profile')
                ->whereDoesntHave('enrollment')
                ->get(),
            
            // Wo students jo officially enroll ho chuke hain
            'active_enrollments' => Enrollment::with(['student', 'schoolClass'])->get(),
            
            // Tamam classes dropdown ke liye
            'classes' => SchoolClass::all(),
        ];

        return view('admin.enrollments.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'roll_number' => 'required|unique:enrollments,roll_number',
            'academic_year' => 'required',
        ]);

        Enrollment::create([
            'student_id' => $request->student_id,
            'school_class_id' => $request->school_class_id,
            'roll_number' => $request->roll_number,
            'academic_year' => $request->academic_year,
            'status' => 'Active',
        ]);

        return back()->with('success', 'Student officially enrolled in the campus roster!');
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return back()->with('success', 'Student enrollment has been terminated.');
    }
}