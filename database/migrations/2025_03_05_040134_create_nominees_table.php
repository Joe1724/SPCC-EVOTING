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
            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('nominee_id'); // Removed foreign constraint
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nominees');
    }
}
