<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('post')->insert([
            ['user_id' => 1, 'title' => "Post One", 'content' => "Post one Content"],
            ['user_id' => 2, 'title' => "Post Two", 'content' => "Post two Content"],
            ['user_id' => 3, 'title' => "Post Three", 'content' => "Post three Content"],
        ]);
    }
}
