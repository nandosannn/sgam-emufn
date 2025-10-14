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
        Schema::create('grupo_musical', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('dataFundacao');
            $table->foreignId('coordenador_id')->constrained('coordenador_grupo')->cascadeOnDelete();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_musical');
    }
};
