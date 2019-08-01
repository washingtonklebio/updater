<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id_server');
            $table->timestamps();
            $table->string('name');
            $table->text('url_address');
            $table->integer('id_software')->unsigned();
            $table->integer('id_version')->unsigned();
            $table->foreign('id_software')->references('id_software')->on('softwares')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_version')->references('id_version')->on('versions')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
