<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AllocationRepositoryInterface;
use Illuminate\Validation\Rule;

class AllocationController extends Controller
{
    protected $allocationRepo;

    public function __construct(AllocationRepositoryInterface $allocationRepo)
    {
        $this->allocationRepo = $allocationRepo;
    }

    public function index()
    {
        $formData = $this->allocationRepo->getFormData();
        $allocations = $this->allocationRepo->getAllAllocations();
        
        return view('admin.allocations.index', compact('formData', 'allocations'));
    }

    public function store(Request $request)
    {
        // Enterprise Level Validation with Custom Error
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'subject_id' => [
                'required',
                'exists:subjects,id',
                // Check if this exact combination already exists
                Rule::unique('teacher_allocations')->where(function ($query) use ($request) {
                    return $query->where('teacher_id', $request->teacher_id)
                                 ->where('school_class_id', $request->school_class_id);
                })
            ]
        ], [
            'subject_id.unique' => 'This teacher is already assigned to this subject in the selected class!'
        ]);

        $this->allocationRepo->allocateTeacher($request->only('teacher_id', 'school_class_id', 'subject_id'));
        
        return back()->with('success', 'Teacher successfully allocated to the class!');
    }

    public function destroy($id)
    {
        $this->allocationRepo->removeAllocation($id);
        return back()->with('error', 'Allocation removed successfully.');
    }
}