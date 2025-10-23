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
        Schema::create('informacoes_grupo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_musical_id')->constrained('grupo_musical', 'id')->cascadeOnDelete();
            $table->foreignId('solicitacao_id')->constrained('solicitacao', 'id')->cascadeOnDelete();
            $table->foreignId('endereco_musicos_id')->constrained('endereco', 'id');
            $table->string('informacoes_musicos');
            $table->string('informacoes_instrumentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacoes_grupo');
    }
};
