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
        Schema::create('solicitacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('evento')->cascadeOnDelete();
            $table->foreignId('informacoes_transporte_id')->nullable()->constrained('solicitacao_transporte', 'id')->cascadeOnDelete();
            $table->boolean('confirmacao_lanche')->nullable();
            $table->string('justificativa');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacao');
    }
};
