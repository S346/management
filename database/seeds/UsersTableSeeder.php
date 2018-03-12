<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Shoko',
            'email' => 'shoko@gmail.com',
            'password' => bcrypt('hogehoge'),
        ]);
        DB::table('users')->insert([
            'name' => 'Shuhei',
            'email' => 'shuhei@gmail.com',
            'password' => bcrypt('hogehoge'),
        ]);
        DB::table('users')->insert([
            'name' => 'Shigeki',
            'email' => 'shigeki@gmail.com',
            'password' => bcrypt('hogehoge'),
        ]);
    }
}
