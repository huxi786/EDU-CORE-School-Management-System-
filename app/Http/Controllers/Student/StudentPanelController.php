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
use App\Interfaces\NotificationInterface;

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
   public function submitAssignment(StoreAssignmentSubmissionRequest $request, $assignmentId, AssignmentService $assignmentService, NotificationInterface $notifier)
{
    // 1. Chef ne file upload ka kaam kar diya
    $assignmentService->handleSubmission($request, $assignmentId);

    $assignment = Assignment::findOrFail($assignmentId);

    // 2. Notification bhej di! (Controller ko nahi pata ke SMS gaya, Email gayi ya System Notif gaya)
    $notifier->send($assignment->teacher_id, "A student just submitted the assignment: " . $assignment->title);

    return back()->with('success', 'Assignment submitted successfully!');
}
    }
