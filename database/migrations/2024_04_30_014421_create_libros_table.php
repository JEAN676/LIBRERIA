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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 30);
            $table->string('autor', 20);
            $table->string('ISBN',13)->unique();
            $table->string('editorial', 20);
            $table->year('anio_publicacion')->nullable();
            $table->string('genero');
            $table->integer('num_paginas');
            $table->string('idioma');
            $table->binary('pdf');
            $table->binary('img');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
