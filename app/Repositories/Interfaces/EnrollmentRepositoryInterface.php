<?php

namespace App\Repositories\Interfaces;

interface EnrollmentRepositoryInterface
{
    public function getAdmissionsData(); 
    public function enrollStudent(array $data); 
    public function cancelEnrollment($id); 
}