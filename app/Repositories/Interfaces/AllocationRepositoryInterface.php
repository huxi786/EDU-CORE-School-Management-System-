<?php

namespace App\Repositories\Interfaces;

interface AllocationRepositoryInterface
{
    public function getFormData(); // Dropdowns ke liye data layega
    public function getAllAllocations(); // Table ke liye data layega
    public function allocateTeacher(array $data); // Save karega
    public function removeAllocation($id); // Delete karega
}