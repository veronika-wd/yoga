<?php

use App\Models\Teacher\Teacher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10);
            $table->dateTime('datetime');
            $table->unsignedInteger('time');
            $table->text('description');
            $table->foreignIdFor(Teacher::class, 'teacher_id')->constrained();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
