<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartylistsTable extends Migration
{
    public function up()
    {
        Schema::create('partylists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('election_id'); // Removed foreign constraint
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partylists');
    }
}
