<?php

namespace App\Repositories\Interfaces;

interface AcademicRepositoryInterface
{
    // Classes ke rules
    public function getAllClasses();
    public function createClass(array $data);
    public function deleteClass($id);

    // Subjects ke rules
    public function getAllSubjects();
    public function createSubject(array $data);
    public function deleteSubject($id);
}