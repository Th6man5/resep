<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('recipe_name');
            $table->string('about');
            $table->string('slug')->unique();
            $table->string('portion');
            $table->string('time');
            $table->string('steps', 10000);
            $table->foreignId('country_id');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->text('ingredients');
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
};
