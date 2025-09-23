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
        Schema::create('user_perfils', function (Blueprint $table) {
            $table->id();
            $table->string('ocupacao');
            $table->string('telefone');
            $table->enum('tipoPerfil', ['solicitante', 'coordenador', 'administrador'])->default('solicitante');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_perfils');
    }
};
