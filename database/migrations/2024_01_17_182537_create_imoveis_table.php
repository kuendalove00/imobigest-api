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
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->enum("tipo",["R", "C"]);
            $table->enum("transacao", ["A","V"]);
            $table->longText("endereco");
            $table->integer("numero_quartos");
            $table->enum("estado",["D","A","V","N"]);
            $table->double("preco");
            $table->foreignId("id_corrector")->constrained("correctores");
            $table->timestamp("criado_aos")->useCurrent();
            $table->timestamp("atualizado_aos")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
    }
};
