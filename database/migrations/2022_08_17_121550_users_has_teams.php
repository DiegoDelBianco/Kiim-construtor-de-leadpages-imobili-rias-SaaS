<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersHasTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** user_id - (chave estrangeira) Código identificador do usuário
        ** team_id - (chave estrangeira) Código identificador da equipe/site ao qual pertence a mídia
        ** permissions - um digito para cada permissão, a cada digito pode ser 0(Sem acesso), 1( ver), 2(ver e editar), 3(ver, editar e adicionar), 4(ver, editar, adicionar e excluir)
        **      -1° Digito - Permissão do usuário sobre a administração dos dados da equipe
        **      -2° Digito - Permissão do usuário sobre a administração dos imóveis da equipe
        **      -3° Digito - Permissão do usuário sobre o analytics da equipe e dos imóveis
        **      -4° Digito - Permissão do usuário sobre a administração dos membros da equipe
        **      -5° Digito - Permissão do usuário sobre a administração dos contratos e faturamento da equipe
        **      -6° Digito - Permissão do usuário sobre a administração dos parceiros da equipe
        ** type - tipo de ligação ex “Proprietário”  “funcionario” “corretor” “Sócio” “Paceiro”
        ** team_owener - identifica se o usuário em questão é dono/criador da equipe (O dono tem sempre permissão total)
        **      -0 - não é o dono
        **      -1 - é o dono
        */
        Schema::create('users_has_teams', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->integer('permissions');
            $table->string('type');
            $table->boolean('team_owener')->nullable();
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
        Schema::dropIfExists('users_has_teams');
    }
}
