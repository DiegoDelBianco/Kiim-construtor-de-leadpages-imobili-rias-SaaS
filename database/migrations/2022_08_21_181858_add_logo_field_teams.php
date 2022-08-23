<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoFieldTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->unsignedBigInteger('favicon_id')->nullable();
         
            $table->foreign('logo_id')->references('id')->on('team_media');
            $table->foreign('favicon_id')->references('id')->on('team_media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['logo_id']);
            $table->dropColumn('logo_id');
            
            $table->dropForeign(['favicon_id']);
            $table->dropColumn('favicon_id');
        });
    }
}
