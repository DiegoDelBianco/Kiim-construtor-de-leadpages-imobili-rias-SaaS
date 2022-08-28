<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeFielSiteTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        ** type = é o tipo de template
        **      -1 para templates de site
        **      -2 para templates de lead page de Imóvel
        **      -3 para templates de lead page de lista de imóveis
        **      -4 para templates de lead page de corretor/imobiliaria
        ** property_id -  a propriedade de referencia da leadpage
        */
        Schema::table('leadpage_templates', function (Blueprint $table) {
            $table->integer('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
