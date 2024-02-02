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
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string("nome",100);
            $table->string("sobrenome",100);
            $table->string("bi", 25);
            $table->date("data_nascimento");
            $table->enum("genero",["M","F"]);
            $table->foreignId("id_usuario")->constrained("usuarios");
            $table->timestamp("criado_aos")->useCurrent();
            $table->timestamp("atualizado_aos")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicos');
    }
};
