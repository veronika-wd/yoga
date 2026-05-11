<?php

namespace Database\Seeders;

use App\Models\Teacher\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Анастасия Лебедева',
                'description' => 'Преподаватель хатха-йоги. Помогает развивать гибкость, дыхание и внутреннее спокойствие.',
            ],
            [
                'name' => 'Мария Орлова',
                'description' => 'Инструктор виньяса-йоги. Фокус на плавных переходах и работе с телом через дыхание.',
            ],
            [
                'name' => 'Екатерина Соколова',
                'description' => 'Преподаватель йога-нидры и медитации. Специализация — расслабление и восстановление.',
            ],
            [
                'name' => 'Ольга Воробьёва',
                'description' => 'Инструктор для начинающих. Мягкий подход к практике и безопасное освоение асан.',
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
