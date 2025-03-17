<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nominee_id');
            $table->unsignedBigInteger('election_id');
            $table->integer('count')->default(0);
            $table->timestamps();

            $table->foreign('nominee_id')->references('id')->on('nominees')->onDelete('cascade');
            $table->foreign('election_id')->references('id')->on('elections')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('votes');
    }
};
