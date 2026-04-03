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
use App\Traits\ImageUploadTrait; // Aapne pehle hi import kar liya tha (Good job!)


class StudentPanelController extends Controller
{
    // ==================================================
    // 1. TRAIT KO CLASS KE ANDAR ON KAREIN
    // ==================================================
    use ImageUploadTrait;

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

    // ==================================================
    // NAYA FUNCTION: STUDENT PROFILE PICTURE UPDATE
    // ==================================================
    public function updateProfilePicture(Request $request)
    {
        // 1. Bouncer (Validation) - Check karega ke file waqai tasweer hai
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student = Auth::user(); // Jo bacha login hai usko get kiya

        if ($request->hasFile('profile_picture')) {
            
            // 2. Agar purani tasweer lagi hui hai, toh Trait se bol kar usko delete karwaya
            if ($student->profile_picture) {
                $this->deleteImage($student->profile_picture, 'public');
            }

            // 3. Trait se nayi tasweer upload karwayi! (Sirf 1 line ka code)
            $newImagePath = $this->uploadImage($request->file('profile_picture'), 'students/profiles');

            // 4. Database mein naya path save kar diya
            $student->update([
                'profile_picture' => $newImagePath
            ]);
        }

        return back()->with('success', 'Profile picture updated successfully!');
    }
}