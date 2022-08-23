<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamPermissionTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** id - Código identificador único do perfil de permissões
        ** type_name -  tipo de ligação ex “Proprietário”  “funcionario” “corretor” “Sócio” “Paceiro”
        ** permissions -  igual ao mesmo campo da tabela “user_has_team”
        */
        Schema::create('team_permission_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->integer('permissions');
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
        Schema::dropIfExists('team_permission_types');
    }
}
