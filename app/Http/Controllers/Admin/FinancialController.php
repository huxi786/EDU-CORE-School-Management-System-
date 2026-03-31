<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\FinancialRepositoryInterface;

class FinancialController extends Controller
{
    protected $financialRepo;

    public function __construct(FinancialRepositoryInterface $financialRepo)
    {
        $this->financialRepo = $financialRepo;
    }

    public function index()
    {
        $data = $this->financialRepo->getFinancialData();
        return view('admin.financials.index', compact('data'));
    }

    public function updateFee(Request $request)
    {
        $request->validate([
            'school_class_id' => 'required|exists:school_classes,id',
            'monthly_fee' => 'required|numeric|min:0',
        ]);

        $this->financialRepo->updateFeeStructure($request->only('school_class_id', 'monthly_fee'));
        
        return back()->with('success', 'Fee structure updated successfully!');
    }

    public function updateSalary(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'base_salary' => 'required|numeric|min:0',
            'per_subject_rate' => 'required|numeric|min:0',
        ]);

        $this->financialRepo->updateSalaryStructure($request->only('teacher_id', 'base_salary', 'per_subject_rate'));
        
        return back()->with('success', 'Payroll structure updated successfully!');
    }
}