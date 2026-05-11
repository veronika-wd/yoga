<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'name' => 'Утренний хатха-йога класс',
                'price' => 1200,
                'datetime' => '2026-05-15 08:00:00',
                'time' => 60,
                'description' => 'Мягкая утренняя практика для пробуждения тела и спокойного начала дня.',
                'teacher_id' => 1,
                'image' => 'events/hatha-morning.jpg',
            ],
            [
                'name' => 'Виньяса флоу для начинающих',
                'price' => 1500,
                'datetime' => '2026-05-16 18:30:00',
                'time' => 75,
                'description' => 'Плавная динамическая практика с акцентом на дыхание и движение.',
                'teacher_id' => 2,
                'image' => 'events/vinyasa-flow.jpg',
            ],
            [
                'name' => 'Йога-нидра и глубокое расслабление',
                'price' => 1000,
                'datetime' => '2026-05-18 20:00:00',
                'time' => 60,
                'description' => 'Практика полного расслабления и восстановления нервной системы.',
                'teacher_id' => 3,
                'image' => 'events/yoga-nidra.jpg',
            ],
            [
                'name' => 'Йога для начинающих',
                'price' => 900,
                'datetime' => '2026-05-20 10:00:00',
                'time' => 90,
                'description' => 'Базовые асаны и безопасное освоение йоги для новичков.',
                'teacher_id' => 4,
                'image' => 'events/beginner-yoga.jpg',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
