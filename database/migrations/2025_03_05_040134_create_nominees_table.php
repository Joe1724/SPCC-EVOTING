<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineesTable extends Migration
{
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('course');
            $table->string('student_id');
            $table->bigInteger('position_id'); // Changed from foreignId
            $table->bigInteger('partylist_id'); // Changed from foreignId
            $table->bigInteger('election_id'); // Changed from foreignId
            $table->text('description')->nullable();
            $table->text('motto')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nominees');
    }
}
