<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHistoryPropertyShareds extends Migration
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
        ** column - Coluna alterada na tabela
        ** before - Valor antes da alteração
        ** after - Valor Após a alteração
        ** users_id - (Chave estrangeira) Código identificador do usuário que fez a alteração
        ** shared_property_id - (Chave estrangeira) Código identificador do compartilhamento de  propriedade alterada
        */
        Schema::create('change_history_property_shareds', function (Blueprint $table) {
            $table->id();
            $table->string('column')->nullable();
            $table->string('before')->nullable();
            $table->string('after')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('property_shared_id')->constrained();
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
        Schema::dropIfExists('change_history_property_shareds');
    }
}
