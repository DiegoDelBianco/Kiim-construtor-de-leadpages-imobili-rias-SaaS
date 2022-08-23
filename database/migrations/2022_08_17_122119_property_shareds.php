<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyShareds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** description - Descrição do imóvel (Definida por quem recebe o imóvel)
        ** teams_id - (Chave estrangeira) Código identificador da equipe que compartilhou
        ** properties_id - (Chave estrangeira) Código identificador do equipe que recebe o imóvel
        ** status - status do imóvel para quem recebeu (Definido por quem recebeu)
        **      -0 - Inativo
        **      -1 - Ativo
        */
        Schema::create('property_shareds', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('property_id')->constrained();
            $table->boolean('status')->default(TRUE);
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
        Schema::dropIfExists('property_shareds');
    }
}
