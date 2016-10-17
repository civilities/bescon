<?php

use Illuminate\Database\Seeder;
use App\user;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::Create([
            'email'    => '4013597@qq.com',
            'password' => Hash::make('admin'),
            'name' => 'admin',
            'phone'    => 18519120546
           ]);
    }
}
