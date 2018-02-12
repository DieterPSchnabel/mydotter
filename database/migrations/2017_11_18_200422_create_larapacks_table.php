<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLarapacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('larapacks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('install_str')->unique()->nullable();
            $table->string('git_url')->nullable();
            $table->string('doc_url')->nullable();
            $table->text('description')->nullable();
            $table->text('is_installed')->nullable()->default('off');
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();
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
        Schema::dropIfExists('larapacks');
    }
}
