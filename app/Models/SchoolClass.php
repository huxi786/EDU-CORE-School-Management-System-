<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = ['name', 'section'];


    public function feeStructure()
    {
        return $this->hasOne(FeeStructure::class);
    }


    public function teacher()
    {
        // Ek class ka ek hi class incharge/teacher hota hai
        return $this->belongsTo(User::class, 'teacher_id');
    }


    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'school_class_id');
    }
}
