<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Umer',
                'email'=>'umer@gmail.com',
                'password'=>'123456',
            ],
            [
                'name'=>'Apple',
                'email'=>'apple@gmail.com',
                'password'=>'1234a56',
            ],
            [
                'name'=>'Farooq',
                'email'=>'farooq@gmail.com',
                'password'=>'123456',
            ],
        ];
        User::insert($users);
    }
}
