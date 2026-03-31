<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    // Form Dikhane ka function
    public function create()
    {
        // Security: Agar bache ne pehle hi form bhar diya hai, toh wapas dashboard bhej do
        if(StudentProfile::where('user_id', Auth::id())->exists()) {
            return redirect()->route('dashboard');
        }

        return view('dashboard.applicant_form');
    }

    // Form ka Data Save karne ka function
    public function store(Request $request)
    {
        // 1. Data Validation
        $request->validate([
            'father_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'phone_number' => 'required|string|max:20',
            'home_address' => 'required|string',
            'emergency_contact' => 'nullable|string|max:20',
            'blood_group' => 'nullable|string|max:5',
            'previous_school' => 'nullable|string|max:255',
        ]);

        // 2. Save Data to Database
        StudentProfile::create([
            'user_id' => Auth::id(),
            'father_name' => $request->father_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'emergency_contact' => $request->emergency_contact,
            'home_address' => $request->home_address,
            'blood_group' => $request->blood_group,
            'previous_school' => $request->previous_school,
        ]);

        // 3. Save hone ke baad wapas Dashboard par bhej do
        return redirect()->route('dashboard')->with('success', 'Application submitted successfully!');
    }
}