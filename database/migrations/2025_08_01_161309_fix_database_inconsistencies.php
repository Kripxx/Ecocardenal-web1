<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    // Corregir nombre de tabla si es necesario
    if (Schema::hasTable('usuarios')) {
        Schema::rename('usuarios', 'usuario');
    }

    // Añadir timestamps a tablas que les falten
    Schema::table('ranking', function (Blueprint $table) {
        if (!Schema::hasColumn('ranking', 'created_at')) {
            $table->timestamps();
        }
    });
    
    // Verificar y corregir otras relaciones
}

public function down()
{
    // Revertir cambios si es necesario
}
};
