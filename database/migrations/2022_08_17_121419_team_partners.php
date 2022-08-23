<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamPartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** auto_shared - Compartilhar todos os novos imóveis automaticamente ou manualmente (Configurado pela equipe dona do imóvel)
        **      -0 - Manualmente
        **      -1 - Automaticamente
        ** auto_active - aceitar todos os novos imóveis automaticamente como ativos, ou ativar manualmente (Configurado pela equipe que recebe os imóveis)
        **      -0 - Os imóveis entram como inativos para quem recebe, e aguarda a ativação manual 
        **      -1 - Os imóveis entram como ativos para quem recebe
        ** teams_id - (chave estrangeira) Código identificador da equipe que vai compartilhar os imóveis
        ** sub_teams_id - (chave estrangeira) Código identificador da equipe que vai receber os imóveis
        ** status - status da parceria
        */
        Schema::create('team_partners', function (Blueprint $table) {
            $table->id();
            $table->integer('auto_shared')->nullable()->default(1);
            $table->integer('auto_active')->nullable()->default(0);
            $table->foreignId('team_id')->constrained();
            $table->unsignedBigInteger('sub_team_id');
            $table->boolean('status')->default(TRUE);
            $table->timestamps();

            
            $table->foreign('sub_team_id')->references('id')->on('teams');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_partners');
    }
}
