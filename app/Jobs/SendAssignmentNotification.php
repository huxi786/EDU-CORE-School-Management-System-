<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendAssignmentNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $assignment;

    // 1. Parchi par Assignment ka data likha ja raha hai
    public function __construct($assignment)
    {
        $this->assignment = $assignment;
    }

    // 2. The Kitchen (Background mein yeh code chalega)
    public function handle(): void
    {
        // Asal project mein hum yahan class ke saare bachon ko nikal kar Email bhejte hain.
        // Abhi hum test karne ke liye sirf ek "Log" (Record) bana rahe hain.
        
        // Farz karein email bhejne mein 3 seconds lagte hain
        sleep(3); 
        
        // Email send hone ka record
        Log::info("✅ BACKGROUND JOB DONE: Sab bachon ko naya assignment bhej diya gaya hai. Title: " . $this->assignment->title);
    }
}