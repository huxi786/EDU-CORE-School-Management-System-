<?php

namespace App\Repositories;

use App\Models\SchoolClass;
use App\Models\User;
use App\Models\FeeStructure;
use App\Models\SalaryStructure;
use App\Repositories\Interfaces\FinancialRepositoryInterface;

class FinancialRepository implements FinancialRepositoryInterface
{
    public function getFinancialData()
    {
        // Classes with their Fee Structures
        $classes = SchoolClass::with('feeStructure')->orderBy('name')->get();

        // Teachers with their Salary Structures AND their Allocations count
        // (withCount se humein pata chal jayega teacher kitne subjects parha raha hai)
        $teachers = User::role('Teacher')
                        ->where('status', 'approved')
                        ->with('salaryStructure')
                        ->withCount('allocations') 
                        ->get();

        return [
            'classes' => $classes,
            'teachers' => $teachers,
        ];
    }

    public function updateFeeStructure(array $data)
    {
        // Check karega agar class ki fee hai toh update, warna naya record
        return FeeStructure::updateOrCreate(
            ['school_class_id' => $data['school_class_id']],
            ['monthly_fee' => $data['monthly_fee']]
        );
    }

    public function updateSalaryStructure(array $data)
    {
        // Check karega agar teacher ki salary hai toh update, warna naya record
        return SalaryStructure::updateOrCreate(
            ['teacher_id' => $data['teacher_id']],
            [
                'base_salary' => $data['base_salary'],
                'per_subject_rate' => $data['per_subject_rate']
            ]
        );
    }
}