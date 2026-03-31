<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAllocation extends Model
{
    protected $fillable = [
        'teacher_id',
        'school_class_id',
        'subject_id',
    ];

    // Relations
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
