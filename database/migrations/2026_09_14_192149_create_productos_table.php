<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
        $table->id(); //este campo es autoincremental en la BD
        $table->string('nombre'); //max 255 caracteres nombre del producto
        $table->string('descripcion'); //max 255 caracteres
        $table->text('descripcion_larga')->nullable(); // mayor a 255 caracteres, nullable indica que tomar valor null x defecto
        $table->float('precio');
        $table->unsignedBigInteger('stock');

        $table->timestamps(); //luego en la BD timestamps: se divide en 2 campos, fecha creacion y fecha de actualizacion del registro
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
