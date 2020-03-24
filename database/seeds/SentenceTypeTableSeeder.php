<?php

use App\Sentence_Types;
use Illuminate\Database\Seeder;

class SentenceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => 'ผญา'],
            ['name' => 'บทความ'],
            ['name' => 'กระทู้'],
            ['name' => 'แฮทแท็ก'],
            ['name' => 'อื่นๆ'],
        ];

        foreach ($datas as $key => $data){
            Sentence_Types::firstOrCreate([
                'name' => $data['name'],
            ], $data);
        }
    }
}
