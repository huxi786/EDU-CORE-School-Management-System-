<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolClass;
use App\Models\Assignment;
use App\Http\Requests\StoreAssignmentRequest;
use App\Services\TeacherService;

class TeacherPanelController extends Controller
{
    // ==========================================
    // 1. MY STUDENTS WALA PAGE
    // ==========================================
    public function myStudents()
    {
        $classes = SchoolClass::with(['enrollments.student'])
            ->where('teacher_id', Auth::id())
            ->get();

        $myClasses = [];

        foreach ($classes as $schoolClass) {
            $students = $schoolClass->enrollments->map(function ($enrollment) {
                return [
                    'id' => $enrollment->student?->id ?? 0,
                    'name' => $enrollment->student?->name ?? 'Unknown Student',
                    'roll_number' => $enrollment->roll_number,
                    'email' => $enrollment->student?->email ?? 'No Email',
                    'initial' => substr($enrollment->student?->name ?? 'U', 0, 1),
                ];
            });

            $myClasses[] = [
                'class_id' => $schoolClass->id, 
                'class_name' => $schoolClass->name,
                'total_students' => $students->count(),
                'students' => $students->toArray()
            ];
        }

        return view('teacher.students', compact('myClasses'));
    }

    // ==========================================
    // 2. EXPORT EXCEL / CSV FUNCTION
    // ==========================================
    public function exportRoster($classId)
    {
        $schoolClass = SchoolClass::where('id', $classId)
                                  ->where('teacher_id', Auth::id())
                                  ->with('enrollments.student')
                                  ->firstOrFail();

        $fileName = 'roster_' . str_replace(' ', '_', strtolower($schoolClass->name)) . '.csv';
        
        $columns = array('Roll Number', 'Student Name', 'Email', 'Enrollment Date');

        return response()->streamDownload(function() use($schoolClass, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($schoolClass->enrollments as $enrollment) {
                fputcsv($file, [
                    $enrollment->roll_number,
                    $enrollment->student?->name ?? 'Unknown',
                    $enrollment->student?->email ?? 'N/A',
                    $enrollment->created_at->format('Y-m-d')
                ]);
            }
            fclose($file);
        }, $fileName);
    }

    // ==========================================
    // 3. ASSIGNMENTS WALA PAGE
    // ==========================================
    public function assignments()
    {
        // Teacher ki classes form dropdown ke liye
        $myClasses = SchoolClass::where('teacher_id', Auth::id())->get();

        // Pehle se bani hui assignments list ke liye
        $assignments = Assignment::with('schoolClass')
            ->where('teacher_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('teacher.assignments', compact('myClasses', 'assignments'));
    }

    // ==========================================
    // 4. ASSIGNMENT SAVE KARNE KA FUNCTION
    // ==========================================
 public function storeAssignment(StoreAssignmentRequest $request, TeacherService $teacherService)
    {
        // 1. Bouncer (Form Request) ne validation pass kar di hai.
        
        // 2. Manager ne Chef (Service) ko validated data de diya kaam karne ke liye.
        $teacherService->createAssignment($request->validated());

        // 3. Manager ne wapis response bhej diya.
        return redirect()->back()->with('success', 'Assignment published successfully!');
    }

    public function markAttendance() { return "Coming Soon"; }
    public function addMarks() { return "Coming Soon"; }
}