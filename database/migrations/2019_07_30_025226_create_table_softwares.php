<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSoftwares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softwares', function (Blueprint $table) {
            $table->increments('id_software');
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->string('dev_address');
            $table->string('dev_path');
            $table->string('production_address');
            $table->string('production_path');
            $table->string('backup_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('softwares');
    }
}
