<?php

namespace App\Services;

use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;

class TeacherService
{
    /**
     * Handle the creation of a new assignment.
     */
    public function createAssignment(array $validatedData)
    {
        // Teacher ki ID automatically add kar dete hain taake form se leni na parre (Security)
        $validatedData['teacher_id'] = Auth::id();

        // Database mein assignment create kar diya
        return Assignment::create($validatedData);
    }
}