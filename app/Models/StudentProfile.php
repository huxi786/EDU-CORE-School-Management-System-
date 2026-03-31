<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    // Is array mein wo tamam columns hone chahiye jo aap form se save kar rahe hain
    protected $fillable = [
        'user_id',             // <-- Yeh line add karna zaroori hai
        'father_name',
        'date_of_birth',
        'gender',
        'phone_number',
        'emergency_contact',
        'home_address',
        'blood_group',
        'previous_school'
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}