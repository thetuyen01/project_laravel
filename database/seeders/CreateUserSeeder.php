<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@gaucon.com',
               'active'=>true,
               'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gaucon.com',
               'active'=>true,
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Tuyen',
                'email'=>'tuyen@gmail.com',
                'active'=>false,
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}