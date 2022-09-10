<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class SeederAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'username' => 'admin',
                'name' => 'akun admin',
                'email' => 'admin@example.com',
                'level' => 'admin',
                'password' => bcrypt('123456')
            ],
            [
                'username' => 'user',
                'name' => 'akun user',
                'email' => 'user@example.com',
                'level' => 'editor',
                'password' => bcrypt('123456')
            ]
        ];

        foreach($user as $key => $value){
            User::create($value);
        };
    }
}
