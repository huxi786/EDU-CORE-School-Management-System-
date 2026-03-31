<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Enrollment;
use App\Repositories\Interfaces\EnrollmentRepositoryInterface;

class EnrollmentRepository implements EnrollmentRepositoryInterface
{
    public function getAdmissionsData()
    {
        return [
            // Smart Filter: Sirf un Approved Students ko lao jinka abhi tak koi enrollment nahi hua!
            'unenrolled_students' => User::role('Student')
                                         ->where('status', 'approved')
                                         ->whereDoesntHave('enrollment')
                                         ->get(),
            
            // Classes ki list
            'classes' => SchoolClass::orderBy('name')->get(),
            
            // Active Enrollments ki list (with relationships)
            'active_enrollments' => Enrollment::with(['student', 'schoolClass'])->latest()->get(),
        ];
    }

    public function enrollStudent(array $data)
    {
        return Enrollment::create($data);
    }

    public function cancelEnrollment($id)
    {
        return Enrollment::destroy($id);
    }
}