<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id')->unique();
            $table->string('course');
            $table->unsignedBigInteger('election_id'); // Removed foreign constraint
            $table->timestamps();
        });
    }

        public function down()
    {
        Schema::dropIfExists('voters');
    }

};
