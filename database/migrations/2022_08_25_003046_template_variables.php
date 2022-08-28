<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TemplateVariables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
    ** Name - Nome da variavel
    ** Team_id - O time que gerou a variavel
    ** Value - O valor da variavel
    ** Type - O tipo de variavel (String, Integer, Money, LongText)
    */

    public function up()
    {
        Schema::create('template_variables', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->foreignId('team_id')->constrained();
            $table->longText('value')->nullable();
            //$table->string('type')->default('string');
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
        Schema::dropIfExists('template_variables');
    }
}
