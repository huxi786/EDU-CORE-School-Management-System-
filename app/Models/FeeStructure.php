<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = ['school_class_id', 'monthly_fee'];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }
}
