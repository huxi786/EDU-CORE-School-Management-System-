<?php

namespace App\Interfaces;

interface NotificationInterface
{
    // Shart: Jo bhi notification bhejne aayega, uske paas yeh function hona laazmi hai
    public function send($userId, $message);
}