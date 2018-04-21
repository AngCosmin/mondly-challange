<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WordsAndPhrases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('word');
            $table->string('picture')->nullable()->default(NULL);
        });

        Schema::create('phrases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phrase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
        Schema::dropIfExists('phrases');
    }
}
