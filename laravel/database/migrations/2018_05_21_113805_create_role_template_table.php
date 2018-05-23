<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_template', function (Blueprint $table) {
          $table->integer('template_id')->unsigned()->index();
          $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');

          $table->integer('role_id')->unsigned()->index();
          $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_template');
    }
}
