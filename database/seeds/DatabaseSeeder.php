<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserTableSeeder::class);      //使用会报错!! 问题未知 未解决!

        /*DB::table('users')->insert([
            'name' => 'admin',
            'email' => '4013597@qq.com',
            'password' => Hash::make('admin'),
            'phone' => 18519120546
        ]);*/

    }
}
