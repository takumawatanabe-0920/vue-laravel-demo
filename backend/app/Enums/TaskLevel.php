<?php

namespace App\Enums;

enum TaskLevel: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH   = 'high';
}
