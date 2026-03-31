<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Admin\StudentApprovalController;
use Illuminate\Support\Facades\Auth; // Ye Auth check karne ke liye zaroori hai
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\AllocationController;
use App\Http\Controllers\Admin\FinancialController;
use App\Http\Controllers\Teacher\TeacherPanelController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Student\AdmissionController;
use App\Http\Controllers\Student\StudentPanelController;


// 1. The Welcoming Root Route
Route::get('/', function () {
    // Ye line seedha aapka khubsurat landing page show karegi
    return view('welcome');
})->name('home');
// Contact Page Route (Simple Static View)
Route::view('/contact', 'contact')->name('contact');
// About Page Route (Simple Static View)
Route::view('/about', 'about')->name('about');

// 2. The Main Dashb    oard Route (Traffic Police)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'otp.verified']) // Yahan se 'check.approval' hata diya hai
    ->name('dashboard');

// 3. Normal Authenticated Routes (Profile & OTP)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // OTP Routes
    Route::get('/verify-otp', [OtpController::class, 'show'])->name('otp.verify');
    Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify.post');


    Route::get('/admission/apply', [AdmissionController::class, 'create'])->name('applicant.form');
    Route::post('/admission/apply', [AdmissionController::class, 'store'])->name('applicant.store');
});

// STUDENT ROUTES GROUP
Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    
    // 1. View Assignments Page
    Route::get('/assignments', [App\Http\Controllers\Student\StudentPanelController::class, 'myAssignments'])->name('assignments');
    
    // 2. Submit Assignment Route (FIXED)
    Route::post('/assignments/{assignmentId}/submit', [App\Http\Controllers\Student\StudentPanelController::class, 'submitAssignment'])->name('assignments.submit');

});

// 4. Admin Only Routes (Step 8 - Student Approvals)
Route::middleware(['auth', 'verified', 'check.approval', 'otp.verified', 'role:Admin'])->group(function () {
    Route::patch('/admin/students/{student}/approve', [StudentApprovalController::class, 'approve'])->name('admin.students.approve');
    Route::delete('/admin/students/{student}/reject', [StudentApprovalController::class, 'reject'])->name('admin.students.reject');
    // NAYE ACADEMIC ROUTES YAHAN ADD KAREIN:
    Route::get('/admin/allocations', [AllocationController::class, 'index'])->name('admin.allocations.index');
    Route::post('/admin/allocations', [AllocationController::class, 'store'])->name('admin.allocations.store');
    Route::delete('/admin/allocations/{id}', [AllocationController::class, 'destroy'])->name('admin.allocations.destroy');

    // NAYE FINANCIAL ROUTES YAHAN ADD KAREIN:
    Route::get('/admin/financials', [FinancialController::class, 'index'])->name('admin.financials.index');
    Route::post('/admin/financials/fee', [FinancialController::class, 'updateFee'])->name('admin.financials.fee.update');
    Route::post('/admin/financials/salary', [FinancialController::class, 'updateSalary'])->name('admin.financials.salary.update');

    // NAYE ENROLLMENT ROUTES YAHAN ADD KAREIN:
    Route::get('/admissions', [EnrollmentController::class, 'index'])->name('admin.enrollments.index');
    Route::post('/admissions', [EnrollmentController::class, 'store'])->name('admin.enrollments.store');
    Route::delete('/admissions/{id}', [EnrollmentController::class, 'destroy'])->name('admin.enrollments.destroy');
});

// NAYE ACADEMIC ROUTES YAHAN ADD KAREIN:
Route::get('/admin/academic', [AcademicController::class, 'index'])->name('admin.academic.index');
Route::post('/admin/academic/class', [AcademicController::class, 'storeClass'])->name('admin.class.store');
Route::delete('/admin/academic/class/{id}', [AcademicController::class, 'destroyClass'])->name('admin.class.destroy');
Route::post('/admin/academic/subject', [AcademicController::class, 'storeSubject'])->name('admin.subject.store');
Route::delete('/admin/academic/subject/{id}', [AcademicController::class, 'destroySubject'])->name('admin.subject.destroy');


// TEACHER ROUTES GROUP
Route::middleware(['auth'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/my-students', [TeacherPanelController::class, 'myStudents'])->name('students');
    Route::get('/attendance', [TeacherPanelController::class, 'markAttendance'])->name('attendance');
    Route::get('/marks', [TeacherPanelController::class, 'addMarks'])->name('marks');
    Route::get('/assignments', [TeacherPanelController::class, 'assignments'])->name('assignments');

    // ASSIGNMENT ROUTES 👇
    Route::get('/assignments', [TeacherPanelController::class, 'assignments'])->name('assignments');
    Route::post('/assignments', [TeacherPanelController::class, 'storeAssignment'])->name('assignments.store');

    // TEACHER ROUTES GROUP ke andar aakhir mein ye line aise likhein:
    Route::get('/classes/{classId}/export', [TeacherPanelController::class, 'exportRoster'])->name('classes.export');
});
// 5. Breeze Default Auth Routes (Login, Register, Passwords etc)
require __DIR__ . '/auth.php';
