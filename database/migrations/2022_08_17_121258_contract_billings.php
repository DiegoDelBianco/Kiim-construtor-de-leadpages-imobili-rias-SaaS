<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContractBillings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** id - Código identificador único da fatura
        ** price - Preço do produto cobrado na fatura
        ** discount - Desconto
        ** totals - Valor total a ser pago (Preço-Desconto)
        ** created_at - Data de emissão da fatura
        ** due_date - Data de Vencimento da fatura
        ** paid_on - Data de pagamento da fatura
        ** contracts_id - (Chave estrangeira) Código identificador do contrato de referência dessa fatura
        ** status - Status da fatura
        **      -1 - Aguardando pagamento
        **      -2 - Pago
        **      -3 - Cancelada
        */
        
        Schema::create('contract_billings', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('totals', 10, 2);
            $table->date('due_date')->nullable();
            $table->date('paid_on')->nullable();
            $table->foreignId('contract_id')->constrained();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_billings');
    }
}
