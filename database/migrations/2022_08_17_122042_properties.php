<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Properties extends Migration
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
        ** title - Titulo do imóvel
        ** cod - Código identificador interno que a imobiliária ou corretor dá a este imóvel
        ** street - Rua do imóvel
        ** number_street - Numero do imóvel na rua
        ** neighborhood - Bairro do imóvel
        ** neighborhood_related - Bairro relacionado, para o imóvel aparecer quando for relacionado também
        ** team_id - (Chave estrangeira) Código identificador da equipe que cadastrou o imóvel
        ** mapsLati - Latitude no maps
        ** mapsLong - Longitude no maps
        ** city - Cidade do imóvel
        ** state - Estado do imóvel
        ** zone - região do imóvel “zona leste” “interior”
        ** property_types_id - (Chave estrangeira) Para relacionar com o tipo de propriedade ex “apartamento”
        ** bedrooms - Quantidade de quartos
        ** suites - Quantidade de Suites
        ** m2 - Metros quadrados totais
        ** m2built - Metros quadrados Construídos
        ** furnished - Identifica se está mobiliada
        **      -0 - não
        **      -1 - sim
        ** bathrooms - Quantidade de banheiros
        ** parking - Vagas na garagem
        ** rent - Identifica se o imóvel está para alugar
        **      -0 - Não está para lugar
        **      -1 - Está para alugar
        ** rent_price - Valor do aluguel
        ** sale - Identifica se o imóvel está à venda
        ** sale_price - Preço de venda
        ** rent_iptu - Valor do IPTU caso esteja para alugar e tenha que pagar o IPTU
        ** condominium_price - Valor do condomínio caso tenha que pagar condomínio
        ** its_condominium - Caso a casa seja em condomínio 
        ** shared_house - Identifica se a casa é compartilhada
        **      -0 - Casa não compartilhada
        **      -1 - Casa compartilhada
        ** description - Descrição do imóvel na página do imóvel
        ** cep - CEP do imóvel
        ** building  - Identifica se o imóvel está em construção ou se já foi construído
        ** end_build - Data de entrega da casa
        ** exchange - Define se aceita permuta
        **      -0 - Não aceita
        **      -1 - Aceita permuta
        ** status - status do imóvel
        **      -0 - inativo
        **      -1 - ativo
        ** pets - define se aceita pets
        **      -0 - Não aceita
        **      -1 - Aceita
        */
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('cod')->nullable();
            $table->string('cep')->nullable();
            $table->string('street')->nullable();
            $table->string('number_street')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('neighborhood_related')->nullable();
            $table->foreignId('team_id')->constrained();
            $table->string('mapsLati')->nullable();
            $table->string('mapsLong')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zone')->nullable();
            $table->foreignId('property_type_id')->constrained();
            $table->integer('bedrooms')->nullable();
            $table->integer('suites')->nullable();
            $table->integer('m2')->nullable();
            $table->integer('m2built')->nullable();
            $table->boolean('furnished')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('parking')->nullable();
            $table->boolean('rent')->nullable();
            $table->decimal('rent_price', 10, 2)->nullable();
            $table->boolean('sale')->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('rent_iptu', 10, 2)->nullable();
            $table->decimal('condominium_price', 10, 2)->nullable();
            $table->boolean('its_condominium')->nullable();
            $table->boolean('shared_house')->nullable();
            $table->string('description')->nullable();
            $table->boolean('building')->nullable();
            $table->date('end_build')->nullable();
            $table->boolean('exchange')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('pets')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
