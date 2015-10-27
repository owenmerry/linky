<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('privacy_id');
            $table->integer('seq');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->timestamps();
        });
        
        Schema::create('collection_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('collection_id');
            $table->timestamps();
        });
        
        Schema::create('collection_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id');
            $table->integer('collection_id');
            $table->timestamps();
        });
        
        Schema::create('privacy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('collections');
        Schema::drop('collection_user');
        Schema::drop('collection_link');
        Schema::drop('privacy');
    }
}
