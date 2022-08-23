<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** id - Código identificador único da Mídia do imóvel
        ** name - Nome da mídia como está salvo na pasta
        ** type -  Finalidade da mídia Ex:. “logo”
        ** order - Numero para ordenar a imagem na lista de exibição
        ** properties_id - (Chave estrangeira) Código identificador
        ** label - Texto para mostrar a baixo da mídia
        ** about - Texto sobre a mídia caso necessário para tag alt
        ** format - Formato da imagem, ex “webp” “svg” “mp4” “gif”
        */
        Schema::create('property_media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->integer('order')->nullable();
            $table->foreignId('property_id')->constrained();
            $table->string('label')->nullable();
            $table->string('about')->nullable();
            $table->string('format');
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
        Schema::dropIfExists('property_media');
    }
}
