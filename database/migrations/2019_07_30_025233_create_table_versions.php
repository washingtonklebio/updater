<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVersions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id_version');
            $table->timestamps();
            $table->integer('id_software')->unsigned();
            $table->boolean('incompatible')->default(0);
            $table->boolean('implement')->default(0);
            $table->text('implement_desc')->nullable();
            $table->boolean('correction')->default(0);
            $table->text('correction_desc')->nullable();
            $table->boolean('pre_launch')->default(0);
            $table->string('identifier');
            $table->text('file_list')->nullable();
            $table->text('sql_commands')->nullable();
            $table->text('script_commands')->nullable();
            $table->boolean('file_generated')->default(0);
            $table->string('file_name')->nullable();
            $table->boolean('file_send')->default(0);
            $table->datetime('date_send')->nullable();
            $table->foreign('id_software')->references('id_software')->on('softwares')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versions');
    }
}
