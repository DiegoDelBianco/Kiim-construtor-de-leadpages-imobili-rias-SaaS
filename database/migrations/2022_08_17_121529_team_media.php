<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** id - Código identificador único da Mídia
        ** name - Nome da mídia como está salvo na pasta
        ** teams_id - (chave estrangeira) Código identificador da equipe/site ao qual pertence a mídia
        ** type - Finalidade da mídia Ex:. “logo”
        ** format - Formato da imagem, ex “webp” “svg” “mp4” “gif”
        ** about - Texto sobre a mídia caso necessário para tag alt
        */
        Schema::create('team_media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('team_id')->constrained();
            $table->string('type');
            $table->string('format');
            $table->string('about')->nullable();
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
        Schema::dropIfExists('team_media');
    }
}
