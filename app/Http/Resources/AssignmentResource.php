<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        // Yahan hum mitti wali gajar (DB Data) ko saaf gajar (API Data) mein badal rahe hain
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'details'     => $this->description ?? 'No details provided',
            'marks'       => $this->total_marks,
            // Date ko hum yahin khoobsurat format karke bhej rahe hain
            'deadline'    => $this->due_date->format('d M Y, h:i A'), 
            
            // Hum relationship ka data bhi bhej sakte hain (maslan Class ka naam)
            'class_name'  => $this->schoolClass ? $this->schoolClass->name : 'N/A',
            
            // Teacher ka naam
            'teacher'     => $this->teacher ? $this->teacher->name : 'Unknown',
        ];
    }
}