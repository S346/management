<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'いぬやしき',
        ]);
        DB::table('projects')->insert([
            'name' => '僕のヒーローアカデミア',
        ]);
        DB::table('projects')->insert([
            'name' => 'ポケモン',
        ]);
    }
}
