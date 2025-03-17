<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('positions', function (Blueprint $table) {
            $table->id(); // This creates an UNSIGNED BIGINT
            $table->string('name');
            $table->bigInteger('election_id')->unsigned(); // Add this column
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
