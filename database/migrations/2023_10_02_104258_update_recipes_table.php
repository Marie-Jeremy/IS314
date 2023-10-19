<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            // Add a column to store the video file path
            $table->string('video_path')->nullable();
            
            // Add a column to indicate whether a video has been uploaded
            $table->boolean('video_uploaded')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            // Remove the columns if rolling back the migration
            $table->dropColumn('video_path');
            $table->dropColumn('video_uploaded');
        });
    }
}
