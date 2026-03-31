<?php

namespace App\Repositories;

use App\Models\SchoolClass;
use App\Models\Subject;
use App\Repositories\Interfaces\AcademicRepositoryInterface;

class AcademicRepository implements AcademicRepositoryInterface
{
    // --- Classes Logic ---
    public function getAllClasses()
    {
        return SchoolClass::latest()->get();
    }

    public function createClass(array $data)
    {
        return SchoolClass::create($data);
    }

    public function deleteClass($id)
    {
        return SchoolClass::destroy($id);
    }

    // --- Subjects Logic ---
    public function getAllSubjects()
    {
        return Subject::latest()->get();
    }

    public function createSubject(array $data)
    {
        return Subject::create($data);
    }

    public function deleteSubject($id)
    {
        return Subject::destroy($id);
    }
}