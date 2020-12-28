<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_email');
            $table->string('user_name');
            $table->string('annonce_image');
            $table->string('annonce_titre');
            $table->bigInteger('post_id');
            $table->string('avatar')->nullable();
            $table->string('CV')->nullable();
            $table->string('LM')->nullable();
            $table->foreignId('annonce_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('interesses');
    }
}
