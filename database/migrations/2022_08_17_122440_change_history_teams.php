<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHistoryTeams extends Migration
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
        ** teams_id - (Chave estrangeira) Código identificador da equipe alterada
        ** users_id - (Chave estrangeira) Código identificador do usuário que fez a alteração
        */
        Schema::create('change_history_teams', function (Blueprint $table) {
            $table->id();
            $table->string('column')->nullable();
            $table->string('before')->nullable();
            $table->string('after')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
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
        Schema::dropIfExists('change_history_teams');
    }
}
