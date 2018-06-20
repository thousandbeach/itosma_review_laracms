<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('messages')->insert([
            ['name' => 'Keisuke 本田・K', 'email' => 'keisukehonda@test.io', 'message' => 'Contact first message'],
            ['name' => '香川 真司', 'email' => 'shinjikagawa@test.io', 'message' => 'Contact second message'],
            ['name' => '長友佑都', 'email' => 'yutonagatomo@test.io', 'message' => 'Contact third message'],
        ]);
    }
}
