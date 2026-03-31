<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'otp_code',
        'otp_expires_at'
    ];

    public function generateOtp()
    {
        $this->otp_code = rand(100000, 999999);
        $this->otp_expires_at = now()->addMinutes(10);
        $this->save(); 
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ================= RELATIONSHIPS =================

    /**
     * Student Profile Connection
     * Yeh function missing tha jiski wajah se error aa raha tha
     */
    public function profile()
    {
        return $this->hasOne(StudentProfile::class, 'user_id');
    }

    /**
     * Student Enrollment Connection
     */
    public function enrollment()
    {
        return $this->hasOne(Enrollment::class, 'student_id');
    }

    /**
     * Teacher Salary Structure
     */
    public function salaryStructure()
    {
        return $this->hasOne(SalaryStructure::class, 'teacher_id');
    }

    /**
     * Teacher Subject/Class Allocations
     */
    public function allocations()
    {
        return $this->hasMany(TeacherAllocation::class, 'teacher_id');
    }
}