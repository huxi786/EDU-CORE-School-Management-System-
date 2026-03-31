<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    // Yahan hum rules define karte hain ke Chef ko kya kya aana chahiye
    public function getPendingStudents();
    public function approveStudent($id);
    public function rejectStudent($id);
    public function getDashboardStats();
}