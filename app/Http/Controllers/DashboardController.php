<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\Assignment;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = Auth::user();

        // =========================================
        // 1. ADMIN ROUTING
        // =========================================
        if ($user->hasRole('Admin')) {
            $stats = $this->userRepository->getDashboardStats();
            return view('dashboard.admin', compact('stats'));
        } 
        
        // =========================================
        // 2. TEACHER ROUTING
        // =========================================
        elseif ($user->hasRole('Teacher')) {
            $allocations = \App\Models\TeacherAllocation::with(['schoolClass', 'subject'])
                ->where('teacher_id', $user->id)
                ->get();
            $salaryInfo = \App\Models\SalaryStructure::where('teacher_id', $user->id)->first();
            $totalSalary = $salaryInfo ? $salaryInfo->base_salary + ($salaryInfo->per_subject_rate * $allocations->count()) : 0;
            
            return view('dashboard.teacher', compact('allocations', 'salaryInfo', 'totalSalary'));
        } 
        
        // =========================================
        // 3. STUDENT & APPLICANT ROUTING
        // =========================================
        else {
            $hasProfile = \App\Models\StudentProfile::where('user_id', $user->id)->exists();
            
            // YAHAN FIX KIYA: user_id ki jagah student_id likha hai 👇
            $enrollment = \App\Models\Enrollment::with('schoolClass')
                ->where('student_id', $user->id) 
                ->first();

            // STEP A: No Profile -> Show Admission Form
            if (!$hasProfile) {
                return view('dashboard.applicant_form');
            } 
            
            // STEP B: Profile exists but not Enrolled -> Show Pending Screen
            elseif ($hasProfile && !$enrollment) {
                return view('dashboard.applicant_pending');
            } 
            
            // STEP C: Enrolled -> Show Final Professional Dashboard
            else {
                // YAHAN BHI FIX KIYA: user_id ki jagah student_id likha hai 👇
                $myClassIds = Enrollment::where('student_id', $user->id)->pluck('school_class_id');
            
                $pendingAssignmentsCount = Assignment::whereIn('school_class_id', $myClassIds)
                                            ->where('due_date', '>=', now()) // Jo abhi overdue nahi huin
                                            ->count();

                // Assignments ka count sath attach kar diya
                return view('dashboard.student', compact('user', 'enrollment', 'pendingAssignmentsCount'));
            }
        }
    }
}