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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action', 100); // Ej: created, updated, deleted, login
            $table->string('auditable_type'); // Nombre de la tabla o modelo afectado
            $table->unsignedBigInteger('auditable_id'); // ID del registro afectado
            $table->json('old_values')->nullable(); // Datos antes del cambio
            $table->json('new_values')->nullable(); // Datos después del cambio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
