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
                'english_name'=>'happy',
                'serbian_name'=>'srećan',
                'image' => 'happy.jpg'
            ],
            [
                'english_name'=>'nice',
                'serbian_name'=>'lijepo',
                'image' => 'fashion.jpg'
            ],
            [
                'english_name'=>'friend',
                'serbian_name'=>'prijatelju',
                'image' => 'friend.jpg'
            ],
            [
                'english_name'=>'explosion',
                'serbian_name'=>'eksplozija',
                'image' => 'explosion.jpg'
            ],
            [
                'english_name'=>'carrot',
                'serbian_name'=>'šargarepa',
                'image' => 'carrot.jpg'
            ],
            [
                'english_name'=>'car',
                'serbian_name'=>'auto',
                'image' => 'car.jpg'
            ],
            [
                'english_name'=>'soldier',
                'serbian_name'=>'vojnik',
                'image' => 'soldier.jpg'
            ],
            [
                'english_name'=>'fear',
                'serbian_name'=>'strah',
                'image' => 'fear.jpg'
            ],
            [
                'english_name'=>'relativity',
                'serbian_name'=>'relativnost',
                'image' => 'relativity.jpg'
            ],
            [
                'english_name'=>'book',
                'serbian_name'=>'knjiga',
                'image' => 'book.jpg'
            ],
            [
                'english_name'=>'Earth',
                'serbian_name'=>'Zemlja',
                'image' => 'earth.jpg'
            ],
            [
                'english_name'=>'speed limit',
                'serbian_name'=>'ograničenje brzine',
                'image' => 'speed_limit.jpg'
            ],
        ]);
    }
}
