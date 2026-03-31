<?php

namespace App\Services;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Auth;

class AssignmentService
{
    // Yeh humara "Chef" hai jo file upload aur database ka kaam sambhalega
    public function handleSubmission($request, $assignmentId)
    {
        $assignment = Assignment::findOrFail($assignmentId);
        
        $file = $request->file('submission_file');
        
        // File ka naam aur path set karna
        $filename = 'assign_' . $assignment->id . '_std_' . Auth::id() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('submissions', $filename, 'public');

        // Database mein save karna
        AssignmentSubmission::updateOrCreate(
            ['assignment_id' => $assignment->id, 'student_id' => Auth::id()],
            ['file_path' => $path, 'status' => 'submitted']
        );

        return true; // Kaam ho gaya!
    }
}