<?php

namespace App\Repositories;

use App\Models\TeacherAllocation;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Repositories\Interfaces\AllocationRepositoryInterface;

class AllocationRepository implements AllocationRepositoryInterface
{
    public function getFormData()
    {
        return [
            // Sirf un users ko lao jo 'Teacher' hain aur approved hain
            'teachers' => User::role('Teacher')->where('status', 'approved')->get(),
            'classes' => SchoolClass::orderBy('name')->get(),
            'subjects' => Subject::orderBy('name')->get(),
        ];
    }

    public function getAllAllocations()
    {
        // 'with' use karne se N+1 query problem nahi aati (Enterprise standard)
        return TeacherAllocation::with(['teacher', 'schoolClass', 'subject'])
                                ->latest()
                                ->get();
    }

    public function allocateTeacher(array $data)
    {
        return TeacherAllocation::create($data);
    }

    public function removeAllocation($id)
    {
        return TeacherAllocation::destroy($id);
    }
}