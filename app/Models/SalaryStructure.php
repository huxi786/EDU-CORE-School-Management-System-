<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryStructure extends Model
{
    protected $fillable = ['teacher_id', 'base_salary', 'per_subject_rate'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
