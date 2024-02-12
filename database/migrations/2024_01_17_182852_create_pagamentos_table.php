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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_cliente")->constrained("clientes");
            $table->foreignId("id_corrector")->constrained("correctores");
            $table->double("pagamento");
            $table->enum("metodo",["T","D"])->nullable();
            $table->foreignId("comprovativo")->nullable();
            $table->timestamp("criado_aos")->useCurrent();
            $table->timestamp("atualizado_aos")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
