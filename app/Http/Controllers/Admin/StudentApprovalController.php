<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface; // 1. Interface Import Kiya

class StudentApprovalController extends Controller
{
    protected $userRepository;

    // 2. Constructor Injection
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // 3. Pehle hum yahan (User $student) likhte the, ab sirf ID le rahe hain
    public function approve($studentId)
    {
        // Chef ko order diya
        $this->userRepository->approveStudent($studentId);
        return back()->with('success', 'Student account approved successfully!');
    }

    public function reject($studentId)
    {
        // Chef ko order diya
        $this->userRepository->rejectStudent($studentId);
        return back()->with('error', 'Student application rejected and removed.');
    }
}