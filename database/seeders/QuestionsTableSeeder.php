<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Questions')->insert([
            [
                'english_name'=>'book',
                'turkish_name'=>'kitap',
                'image' => 'book.jpg'
            ],
            [
                'english_name'=>'car',
                'turkish_name'=>'araba',
                'image' => 'car.jpg'
            ],
            [
                'english_name'=>'cat',
                'turkish_name'=>'kedi',
                'image' => 'cat.jpg'
            ],
            [
                'english_name'=>'dog',
                'turkish_name'=>'köpek',
                'image' => 'dog.jpg'
            ],
            [
                'english_name'=>'house',
                'turkish_name'=>'ev',
                'image' => 'house.jpg'
            ],
            [
                'english_name'=>'mobile phone',
                'turkish_name'=>'cep telefonu',
                'image' => 'mobile-phone.jpg'
            ],
            [
                'english_name'=>'orange',
                'turkish_name'=>'portakal',
                'image' => 'orange.jpg'
            ],
            [
                'english_name'=>'pool',
                'turkish_name'=>'havuz',
                'image' => 'pool.jpg'
            ],
            [
                'english_name'=>'tree',
                'turkish_name'=>'ağaç',
                'image' => 'tree.jpg'
            ],
        ]);
    }
}
