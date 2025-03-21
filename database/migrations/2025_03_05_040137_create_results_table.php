<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('nominee_id');
            $table->unsignedBigInteger('election_id');

            // Removed all foreign key constraints
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
