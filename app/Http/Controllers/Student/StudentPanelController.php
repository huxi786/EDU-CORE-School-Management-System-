<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use App\Models\Enrollment;
use App\Models\AssignmentSubmission;
use App\Models\User;
use App\Http\Requests\StoreAssignmentSubmissionRequest;
use App\Services\AssignmentService;

class StudentPanelController extends Controller
{
    public function myAssignments()
    {
        // 1. Pehle pata karo bacha kin classes mein enroll hai
        $myClassIds = Enrollment::where('student_id', Auth::id())->pluck('school_class_id');
        // 2. Un classes ki tamam assignments nikal lo
        $assignments = Assignment::with(['teacher', 'schoolClass'])
            ->whereIn('school_class_id', $myClassIds)
            ->orderBy('due_date', 'asc') // Jo pehle submit karni hai wo oopar aayegi
            ->get();

        return view('student.assignments', compact('assignments'));
    }
     
// ==================================================
    // STUDENT ASSIGNMENT SUBMISSION (ENTERPRISE LEVEL)
    // ==================================================
    public function submitAssignment(StoreAssignmentSubmissionRequest $request, $assignmentId, AssignmentService $assignmentService)
    {
        // 1. Bouncer (Form Request) ne apna kaam kar diya.
        // 2. Manager (Controller) ne Chef (Service) ko kaam de diya.
        $assignmentService->handleSubmission($request, $assignmentId);

        // 3. Manager ne customer ko khana serve kar diya (Success message)
        return back()->with('success', 'Assignment submitted successfully! Great job.');
    }
    }
