<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('instructor');
            $table->string('duration');
            $table->string('image');
            $table->unsignedInteger('price');
            $table->string('category');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('courses'); }
};
