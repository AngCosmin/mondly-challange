<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsAndPhrasesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->truncate();
        DB::table('phrases')->truncate();

        $words = [
            [
                'word' => 'apple',
                'picture' => 'apple.jpg',
            ],
            [
                'word' => 'banana',
                'picture' => 'banana.jpg',
            ],
            [
                'word' => 'car',
                'picture' => 'car.jpg',
            ],
            [
                'word' => 'plane',
                'picture' => 'plane.jpg',
            ],
            [
                'word' => 'dog',
                'picture' => 'dog.jpg',
            ],
            [
                'word' => 'bear',
                'picture' => 'bear.jpg',
            ],
            [
                'word' => 'city',
                'picture' => 'city.jpg',
            ],
            [
                'word' => 'roof',
                'picture' => 'roof.jpg',
            ],
            [
                'word' => 'cow',
                'picture' => 'cow.jpg',
            ],
            [
                'word' => 'table',
                'picture' => 'table.jpg',
            ],
        ];

        $phrases =[
            [
                'phrase' => 'I need a tooth extracted'
            ],
            [
                'phrase' => 'I have a loose tooth'
            ],
            [
                'phrase' => 'I may have a cavity'
            ],
            [
                'phrase' => 'I would like an x-ray'
            ],
            [
                'phrase' => 'I would like nitrous oxide'
            ],
        ];

        DB::table('words')->insert($words);
        DB::table('phrases')->insert($phrases);
    }
}
