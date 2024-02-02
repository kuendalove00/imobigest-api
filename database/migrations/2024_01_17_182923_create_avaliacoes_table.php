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
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_imovel")->constrained("imoveis");
            $table->foreignId("id_cliente")->constrained("clientes");
            $table->integer("avaliacao");
            $table->longText("comentario");
            $table->date("data");
            $table->timestamp("criado_aos")->useCurrent();
            $table->timestamp("atualizado_aos")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
