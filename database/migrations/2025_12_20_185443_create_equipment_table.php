<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_equipment_id')->constrained('equipment_type')->restrictOnDelete();
            $table->string('brand', 100);
            $table->string('model', 250)->nullable();
            $table->string('serial', 100)->unique();
            $table->foreignId('equipment_status_id')->constrained('equipment_status')->restrictOnDelete();
            $table->text('comment')->nullable();
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
