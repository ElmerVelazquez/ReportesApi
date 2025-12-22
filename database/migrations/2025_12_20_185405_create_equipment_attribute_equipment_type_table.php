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
        Schema::create('equipment_attribute_equipment_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_type_id')->constrained('equipment_types')->restrictOnDelete()->name('eq_attr_eq_type_eq_type_id_fk');
            $table->foreignId('equipment_attribute_id')->constrained('equipment_attributes')->cascadeOnDelete()->name('eq_attr_eq_type_attr_id_fk');
            $table->timestamps();

            // Evita duplicados: un mismo tipo no puede tener el mismo atributo dos veces
            $table->unique(['equipment_type_id', 'equipment_attribute_id'], 'eq_type_attr_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_attribute_equipment_type');
    }
};
