<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    // Pending students nikalne ki logic ab yahan hogi
    public function getPendingStudents()
    {
        return User::role('Student')->where('status', 'pending')->get();
    }

    // Student approve karne ki logic
    public function approveStudent($id)
    {
        $student = User::findOrFail($id);
        return $student->update(['status' => 'approved']);
    }

    // Student reject karne ki logic
    public function rejectStudent($id)
    {
        $student = User::findOrFail($id);
        return $student->delete();
    }

    public function getDashboardStats()
    {
        return [
            // Active Counts
            'active_students' => User::role('Student')->where('status', 'approved')->count(),
            'active_teachers' => User::role('Teacher')->where('status', 'approved')->count(),

            // Pending Counts
            'pending_students' => User::role('Student')->where('status', 'pending')->count(),
            'pending_teachers' => User::role('Teacher')->where('status', 'pending')->count(),

            // Latest 5 Pending Approvals (Mixed Teachers & Students)
            'pending_list' => User::where('status', 'pending')->latest()->take(5)->get(),
        ];
    }
}
