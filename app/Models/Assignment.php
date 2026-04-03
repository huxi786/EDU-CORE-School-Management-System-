<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'school_class_id',
        'title',
        'description',
        'total_marks',
        'due_date',
    ];

    // Dates ko automatically Laravel Carbon instances mein convert kar dega
    protected $casts = [
        'due_date' => 'datetime',
    ];

    // Ek assignment kisi ek class ki hoti hai
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    // Ek assignment kisi teacher ne banayi hoti hai
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function submissions()
    {
        // Yeh line Laravel ko batati hai ke ek assignment ki bohot saari submissions hoti hain
        return $this->hasMany(AssignmentSubmission::class, 'assignment_id');
    }
}
