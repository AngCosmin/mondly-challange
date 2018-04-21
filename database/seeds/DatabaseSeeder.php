<?php

use Illuminate\Database\Seeder;
use WordsAndPhrases;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(WordsAndPhrases::class);
    }
}
