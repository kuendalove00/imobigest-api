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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("email");
            $table->string("password");
            $table->enum("papel",["1","2","3","4"]);
            $table->timestamp("criado_aos")->useCurrent();
            $table->timestamp("atualizado_aos")->useCurrent()->useCurrentOnUpdate();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
