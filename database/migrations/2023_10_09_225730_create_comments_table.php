<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id'); // Foreign key to relate to the recipes table
            $table->unsignedBigInteger('user_id')->nullable();   // Foreign key to relate to the users table
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->timestamps();

             // Define foreign key constraint
             $table->foreign('recipe_id')
             ->references('id')
             ->on('recipes')
             ->onDelete('cascade'); // Delete related comments when a recipe is deleted

             $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
