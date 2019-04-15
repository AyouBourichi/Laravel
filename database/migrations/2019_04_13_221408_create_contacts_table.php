<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('civilite')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->string('fonction')->nullable();
            $table->string('service')->nullable();
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('societe_nom')->nullable();
            $table->string('societe_adresse')->nullable();
            $table->integer('societe_code_postal')->nullable();
            $table->string('societe_ville')->nullable();
            $table->string('societe_telephone')->nullable();
            $table->string('societe_site_web')->nullable();
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
        Schema::drop('contacts');
    }
}
