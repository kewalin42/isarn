<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
           [ 'name' => 'kewalin',
            // 'lastname' => 'siripun',
            'email' => 'kewalin_s@gmail.com',
            'password' => bcrypt('1234')
            ],
        ];
        foreach ($datas as $key => $data){
            User::firstOrCreate([
                'name' => $data['name'],
            ],$data);
        }
    }
}
