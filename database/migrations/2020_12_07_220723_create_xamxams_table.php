<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXamxamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xamxams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nbreDeVus')->nullable();
            $table->boolean('archive')->default(false);
            $table->string('titre');
            $table->string('tags');
            $table->text('contenu');
            $table->string('image');
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
        Schema::dropIfExists('xamxams');
    }
}
