<?php

namespace App\Services;

use App\Interfaces\NotificationInterface;
use Illuminate\Support\Facades\Log;

// Yeh class NotificationInterface ki shart poori kar rahi hai (implements)
class SystemNotificationService implements NotificationInterface
{
    public function send($userId, $message)
    {
        // Asal project mein yahan database mein notification save karne ka code aayega.
        // Abhi test karne ke liye hum sirf Laravel ki Log file mein likh rahe hain.
        Log::info("System Notification sent to User ID $userId: $message");
        
        return true;
    }
}