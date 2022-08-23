<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserPaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        **id - Código identificador único do
        **method - Método de pagamento
        **  -1 - Pix
        **  -2 - Boleto Bancário
        **  -3 - Cartão de crédito
        **doc -  Documento da fatura
        **full_name - Nome completo da fatura
        **number_card - Número do cartão de crédito (caso o pagamento seja cartão)
        **due_date_card - Número do cartão de crédito (caso o pagamento seja cartão) 4 digitos de numeros inteiros (ano+mes)
        **cod_card - Número do cartão de crédito (caso o pagamento seja cartão)
        **users_id -(chave estrangeira) usuário
        */
        Schema::create('user_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->integer('method');
            $table->string('doc');
            $table->string('full_name');
            $table->string('number_card')->nullable();
            $table->integer('due_date_card')->nullable();
            $table->integer('cod_card')->nullable();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('user_payment_methods');
    }
}
