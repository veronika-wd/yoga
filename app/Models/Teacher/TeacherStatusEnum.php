<?php

namespace App\Models\Teacher;

enum TeacherStatusEnum: string
{
    case STATUS = 'status';

    public function label(): string
    {
        return match ($this) {
            self::STATUS => 'Статус',
        };
    }
}
