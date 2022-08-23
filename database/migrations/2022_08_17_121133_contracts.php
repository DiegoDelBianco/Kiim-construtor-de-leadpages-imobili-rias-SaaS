<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** id - Código identificador único do
        ** timestamp - Data em que o produto foi contratado
        ** users_id - (Chave estrangeira) Código identificador do usuário que contratou o produto
        ** teams_id - (Chave estrangeira) Código identificador da equipe que vai receber o produto
        ** products_id - (Chave estrangeira) Código identificador do produto que foi contratado
        ** status - Satatus do contrato
        **      -1 - Ativo
        **      -2 - Pendente
        **      -3 - Cancelado
        ** renovation - Período de renovação da fatura em meses
        ** invoice_date_day - Dia da fatura
        ** invoice_date_month - Mês da fatura
        ** payment_method - Método de pagamento
        **      -1 - Pix
        **      -2 - Boleto Bancário
        **      -3 - Cartão de crédito
        ** payment_methods_id - (Chave estrangeira) Código identificador do método de pagamento relacionado ao usuário
        ** contract - Contrato com termos assinados na hora da contratação (Texto inteiro)
        */
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('status')->nullable();
            $table->string('renovation')->nullable();
            $table->integer('invoice_date_day')->nullable();
            $table->integer('invoice_date_month')->nullable();
            $table->integer('payment_method')->nullable();
            $table->foreignId('user_payment_method_id')->constrained();
            $table->longText('contract')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
