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
            //es necesario definir las claves foraneas manualmente para poder nombrar sus constraint y evitar conflictos por ser demasiado grandes
            $table->unsignedBigInteger('equipment_type_id');
            $table->unsignedBigInteger('equipment_attribute_id');
            $table->foreign('equipment_type_id', 'eq_attr_eq_type_eq_type_id_fk')//se nombra la clave foranea
                ->references('id')
                ->on('equipment_types')
                ->restrictOnDelete();
            $table->foreign('equipment_attribute_id', 'eq_attr_eq_type_attr_id_fk')
                ->references('id')
                ->on('equipment_attributes')
                ->cascadeOnDelete();
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
