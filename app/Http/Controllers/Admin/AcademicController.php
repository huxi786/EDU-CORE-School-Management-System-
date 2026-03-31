<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AcademicRepositoryInterface;

class AcademicController extends Controller
{
    protected $academicRepo;

    public function __construct(AcademicRepositoryInterface $academicRepo)
    {
        $this->academicRepo = $academicRepo;
    }

    // Main Page jahan Classes aur Subjects dono nazar aayenge
    public function index()
    {
        $classes = $this->academicRepo->getAllClasses();
        $subjects = $this->academicRepo->getAllSubjects();
        return view('admin.academic.index', compact('classes', 'subjects'));
    }

    // Nayi Class save karna
    public function storeClass(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'section' => 'nullable|string|max:50',
        ]);

        $this->academicRepo->createClass($request->only('name', 'section'));
        return back()->with('success', 'Class added successfully!');
    }

    // Class delete karna
    public function destroyClass($id)
    {
        $this->academicRepo->deleteClass($id);
        return back()->with('error', 'Class deleted!');
    }

    // Naya Subject save karna
    public function storeSubject(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
        ]);

        $this->academicRepo->createSubject($request->only('name', 'code'));
        return back()->with('success', 'Subject added successfully!');
    }

    // Subject delete karna
    public function destroySubject($id)
    {
        $this->academicRepo->deleteSubject($id);
        return back()->with('error', 'Subject deleted!');
    }
}