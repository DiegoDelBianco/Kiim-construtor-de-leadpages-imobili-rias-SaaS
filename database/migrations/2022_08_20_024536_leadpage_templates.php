<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadpageTemplates extends Migration
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
        ** name - Nome do template (Também referencia a pasta do template)
        ** pro - define se o template é exclusivo para usuários pro
        **      -0 - template disponível para todos os usuários
        **      -1 - template disponível apenas para usuários pro
        ** version - versão atual do template
        */
        Schema::create('leadpage_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('version')->nullable();
            $table->boolean('pro')->default(FALSE);
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
        Schema::dropIfExists('leadpage_templates');
    }
}
