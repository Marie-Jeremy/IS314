<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->json('ingredients');
            $table->json('steps');
            $table->boolean('video_recipe')->default(false);
            $table->text('video_embed_code')->nullable();
            $table->string('yield')->nullable();
            $table->integer('servings')->nullable();
            $table->string('prep_time')->nullable();
            $table->string('cook_time')->nullable();
            $table->string('ready_in')->nullable();
            $table->string('tags')->nullable();
            $table->string('recipe_type')->nullable();
            $table->string('cuisine')->nullable();
            $table->string('skill')->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
