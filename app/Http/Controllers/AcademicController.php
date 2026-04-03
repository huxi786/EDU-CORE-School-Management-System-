<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function index()
    {
        // Yeh views/academics/index.blade.php ko load karega
        return view('academics.index');
    }
}