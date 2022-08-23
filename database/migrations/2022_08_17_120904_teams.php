<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teams extends Migration
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
        ** name - Nome da equipe, pode ser o nome da imobiliária, do corretor, iniciais dos corretores, etc
        ** sub_domain - nome do dominio .kiim.com.br
        ** domain - domínio comprado do cliente que será direcionado para o sistema (caso ele já tenha)
        ** properties_auto_title - Modelo de título automático para as propriedades marcadas como auto_title usar nomes dos campos com $ no inicio ex “$tipo com $m2 no bairro $bairro”
        ** show_address - Define se o endereço ficara visivel no site
        **      -0 - Esconder
        **      -1 - Mostrar
        ** cep - CEP do escriorio/imobiliária
        ** street - Rua do escriorio/imobiliária
        ** neighborhood - Bairro do escriorio/imobiliária
        ** city - Cidade do escriorio/imobiliária
        ** state - estado do escriorio/imobiliária
        ** mapsLati - Latitude no maps
        ** mapsLong - Longitude no maps
        ** facebook - Link do facebook do cliente
        ** instagram -  Link do instagram do cliente
        ** youtube -  Link do youtube do cliente
        ** f_pixel - Código do pixel do facebook
        ** g_analytics - Código do analytics
        ** g_adwords - Código do adwords
        ** g_tags - Código do google Tags maneger
        ** creci - Creci do cliente (imobiliária ou corretor)
        ** phone1 - Telefone de contato 1
        ** phone2 - Telefone de contato 2
        ** whatsapp - Link do whatsapp
        ** email - E-mail de contato
        ** status - Satatus do time
        **      -0 - inativo
        **      -1 - ativo
        ** visible - Identifica se o site vai ficar disponível ao público
        **      -0 - Site omitido
        **      -1 - Site disponivel
        ** templates_id - (chave estrangeira) Código identificador do template que o site vai usar
        ** color1 - Cor principal do site (caso nada seja definido usa a cor principal padrão do tema )
        ** color2 - Cor secundária do site (caso nada seja definido usa a cor secundária padrão do tema)
        ** color3 - ‘’
        ** color4 - ‘’
        ** color5 - ‘’
        */
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sub_domain')->unique();
            $table->string('domain')->nullable();
            $table->string('properties_auto_title')->nullable();
            $table->boolean('show_address');
            $table->string('cep');
            $table->string('street');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('mapsLati')->nullable();
            $table->string('mapsLong')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('f_pixel')->nullable();
            $table->string('g_analytics')->nullable();
            $table->string('g_adwords')->nullable();
            $table->string('g_tags')->nullable();
            $table->string('creci');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->boolean('status')->default(FALSE);
            $table->boolean('visible')->default(TRUE);
            $table->foreignId('site_template_id')->constrained()->default('1');
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('color3')->nullable();
            $table->string('color4')->nullable();
            $table->string('color5')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
