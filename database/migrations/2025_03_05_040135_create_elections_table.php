<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Add this line

return new class extends Migration {
    public function up(): void {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['pending', 'ongoing', 'completed']);
            $table->timestamp('start')->default(DB::raw('CURRENT_TIMESTAMP')); // ✅ Set default value
            $table->timestamp('end')->nullable(); // ✅ Allow NULL values
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('elections');
    }
};
