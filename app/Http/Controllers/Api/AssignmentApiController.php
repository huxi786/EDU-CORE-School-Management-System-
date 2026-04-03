<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Http\Resources\AssignmentResource; // Humara Makeup Artist
use Illuminate\Http\Request;

class AssignmentApiController extends Controller
{
    public function index()
    {
        // 1. Khet se sari gajrein (Assignments) nikalo, sath mein Class aur Teacher bhi le aao
        $assignments = Assignment::with(['schoolClass', 'teacher'])
                        ->orderBy('due_date', 'asc')
                        ->get();

        // 2. Un sab gajron ko Makeup Artist (Resource) ke hawale kar do
        // Note: Jab data zyada ho (List ho) toh "collection" use karte hain
        return AssignmentResource::collection($assignments);
    }
}