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
        Schema::create('transporte_veiculos', function (Blueprint $table) {
            $table->id('id');

            $table->foreignId('solicitacao_transporte_id')
                  ->constrained('solicitacao_transporte', 'id')
                  ->cascadeOnDelete();

            $table->foreignId('veiculo_id')
                  ->constrained('veiculos', 'id')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transporte_veiculos');
    }
};
